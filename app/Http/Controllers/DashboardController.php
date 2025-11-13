<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('web.dashboard');
        } else {
             return redirect('/web/login');
        }
    }

    public function carrito()
    {
        return view('web.carrito');
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
}
