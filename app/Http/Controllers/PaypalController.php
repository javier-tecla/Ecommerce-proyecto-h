<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        dd($response);

        // try {
        //     $response = $this->provider->createOrder($data);

        //     if (isset($response['id']) && $response['id'] != null) {
        //         // Redirigir al usuario a Paypal para completar el pago
        //         foreach ($response['links'] as $link) {
        //             if ($link['rel'] === 'approve') {
        //                 return redirect()->away($link['href']);
        //             }
        //         }
        //         return redirect()->route('web.carrito.index')->with('mensaje', 'No se pudo redirigir a PayPal.')->with('icono', 'error');
        //     }else{
        //         return redirect()->route('web.carrito.index')->with('mensaje', 'Error al crear la orden de PayPal')->with('icono', 'error');
        //     }
        // } catch (\Exception $e) {
        //     return redirect()->route('web.carrito.index')->with('mensaje', 'Excepción capturada:' . $e->getMessage())->with('icono', 'error');
        // }
    }

    public function gracias()
    {

    }

    public function cancelar()
    {

    }
}
