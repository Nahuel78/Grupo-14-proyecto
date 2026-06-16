<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formularioLogin(){
    return view('backend.usuarios.login');
}

    public function formularioRegistro(){
        return view('backend.usuarios.registro');
    }

    public function registrar(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'cliente'
        ]);

        return redirect('/login');
    }

    // Valida que lleguen el email y la password
     public function autenticar(Request $request){
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credenciales)){

            $request->session()->regenerate();

            if(Auth::user()->email === 'nahuelg947@gmail.com' || Auth::user()->rol === 'admin'){
                return redirect('/admin');
            }

            // Cualquier otro usuario que no cumpla lo de arriba, va a cliente
            return redirect('/cliente');
        }

        return back()->withErrors([
            'email' => 'Email o contraseña incorrectos'
        ]);
    }

    public function logout(Request $request){
        Auth:: logout();

        $request->session()-> invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}