<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Ajuste;

use App\Models\Carrito;
use App\Models\DetalleOrden;
use Illuminate\Http\Request;
use App\Mail\CompraConfirmada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{

    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $this->provider->getAccessToken();
    }

    public function pago(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'direccion_envio' => 'required|string|max:255',
            'total' => 'required|numeric|min:0.01',
        ]);

        $direccion_formulario = $request->input('direccion_envio');
        $request->session()->put('direccion_envio', $direccion_formulario);
        $total = $request->input('total');
        $data = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => config('paypal.currency'),
                        "value" => number_format($total, 2, '.', '')
                    ],
                    "description" => "Compra en mi tienda online"
                ]
            ],
            "application_context" => [
                "return_url" => route('web.paypal.gracias'),
                "cancel_url" => route('web.paypal.cancelar'),
            ]
        ];

        $response = $this->provider->createOrder($data);

        // dd($response);

        try {
            $response = $this->provider->createOrder($data);

            if (isset($response['id']) && $response['status'] == 'CREATED') {
                // Redirigir al usuario a Paypal para completar el pago
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
                return redirect()->route('web.carrito.index')->with('mensaje', 'No se pudo redirigir a PayPal.')->with('icono', 'error');
            }else{
                return redirect()->route('web.carrito.index')->with('mensaje', 'Error al crear la orden de PayPal')->with('icono', 'error');
            }
        } catch (\Exception $e) {
            return redirect()->route('web.carrito.index')->with('mensaje', 'Excepción capturada:' . $e->getMessage())->with('icono', 'error');
        }

    }

    public function gracias(Request $request)
    {
        $usuario_id = Auth::user()->id;
        // Lógica para la página de agradecimiento despues del pago exitoso
        $token = $request->query('token');
        try{
            $response = $this->provider->capturePaymentOrder($token);

            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                // Aqui puedes actualizar el estado del pedido en tu base de datos si es necesario
                // dd($response);
                $DatosPago = $response['purchase_units'][0]['payments']['captures'][0];
                $total = $DatosPago['amount']['value'];
                $transaccion_id = $DatosPago['id'];
                $estado_pago = $DatosPago['status'];
                $divisa = $DatosPago['amount']['currency_code'];
                $estado_orden = 'Procesando';
                $direccion_envio = $request->session()->get('direccion_envio', 'No proporcionada');

                DB::beginTransaction();
                try {
                    // Guardar la orden en la base de datos 
                    $orden = new Orden();
                    $orden->usuario_id = $usuario_id;
                    $orden->total = $total;
                    $orden->divisa = $divisa;
                    $orden->estado_pago = $estado_pago;
                    $orden->estado_orden = $estado_orden;
                    $orden->transaccion_id = $transaccion_id;
                    $orden->direccion_envio = $direccion_envio;
                    $orden->save();

                    // Guarda los detalles de la orden
                    $carritos = Carrito::where('usuario_id', $usuario_id)->get();
                    foreach ($carritos as $item) {
                        $detalle = new DetalleOrden();
                        $detalle->orden_id = $orden->id;
                        $detalle->producto_id = $item->producto_id;
                        $detalle->cantidad = $item->cantidad;
                        $detalle->precio = $item->producto->precio_venta;
                        $detalle->save();

                        // descontar stock
                        $producto = $item->producto;
                        $producto->stock -= $item->cantidad;
                        $producto->save();

                        // eliminar el producto del carrito
                        $item->delete();
                    }

                    DB::commit();

                    Mail::to($orden->usuario->email)->send(new CompraConfirmada($orden));

                    return redirect()->route('web.paypal.orden_completado',$orden->id)->with('mensaje', 'Pago realizado con éxito. ¡Gracias por tu compra!, se envio una copia de la orden a tu correo electronico.')->with('icono', 'success');

                }catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->route('web.carrito.index')->with('mensaje', 'Error al guardar la orden: ' . $e->getMessage())->with('icono','error');
                }



                return redirect()->route('web.carrito.index')->with('mensaje', 'Pago realizado con éxito. ¡Gracias por tu compra!')->with('icono', 'success');
            }else{
                return redirect()->route('web.carrito.index')->with('mensaje', 'El pago no se completó correctamente.')->with('icono', 'error');
            }
        } catch (\Exception $e) {
            return redirect()->route('web.carrito.index')->with('mensaje', 'Excepción capturada:' . $e->getMessage())->with('icono', 'error');
        }
                
    }

    public function orden_completado($id)
    {
        $orden = Orden::findOrFail($id);
        $ajuste = Ajuste::first();
        return view('web.orden_completado',compact('orden','ajuste'));
    }
    

    public function cancelar()
    {

    }
}
