<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orden;
use App\Models\Ajuste;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $ajuste = Ajuste::first();
            $total_pedidos = Orden::where('usuario_id',Auth::user()->id)->count();
            $pedidos = Orden::with('usuario','detalles')->where('usuario_id',Auth::user()->id)->get();
            return view('web.dashboard', compact('ajuste', 'total_pedidos','pedidos'));
        } else {
             return redirect('/web/login');
        }
    }

    public function carrito()
    {
        return view('web.carritos');
    }

    public function ajustes()
    {
        $ajuste = Ajuste::first();
        return view('web.ajustes', compact('ajuste'));
    }

    public function informacion_personal(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->back()->with('mensaje', 'Información personal actualizada correctamente.')->with('icono', 'success');
    }

    public function actualizar_password(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verificar la contraseña actual
        if (!password_verify($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }

        // Actualizar la contraseña
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->back()->with('mensaje', 'Contraseña actualizada correctamente.')->with('icono', 'success');
    }

    public function login()
    {
        $ajuste = Ajuste::first();
        return view('web.login', compact('ajuste'));
    }

    public function autenticacion(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('/dashboard');
        }else{
            // Autentificacion fallida
            return redirect('/web/login')->withErrors(['login_error' => 'Credenciales inválidas']);
        }
    }

    public function registro()
    {
        $ajuste = Ajuste::first();
        return view('web.registro', compact('ajuste'));
    }

    public function crear_cuenta(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $user->assignRole('CLIENTE');

        // Iniciar sesión automaticamente después del registro
        Auth::login($user);

        return redirect('/dashboard');
        
    }
}
