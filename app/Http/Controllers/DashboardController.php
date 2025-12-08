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
