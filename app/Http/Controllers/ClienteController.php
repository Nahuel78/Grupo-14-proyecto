<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pedido;


class ClienteController extends Controller
{
    public function index()
    {
        $productos = []; // Después los traemos de la base de datos

        return view('backend.usuarios.cliente', compact('productos')); 
    }

    public function editarPerfil()
{
    return view('backend.usuarios.editar-perfil');
}

public function actualizarPerfil(Request $request)
{
   $request->validate([
    'name' => 'required',
    'email' => 'required|email|unique:users,email,' . Auth::id(),
    'password' => 'nullable|confirmed|min:6'
]);

    $usuario = Auth::user();

    $usuario->name = $request->name;
    $usuario->email = $request->email;

    if ($request->filled('password')) {
        $usuario->password = Hash::make($request->password);
    }

    $usuario->save();

    return redirect()
        ->route('cliente.perfil')
        ->with('success', 'Perfil actualizado correctamente');
}

public function pedidos()
{
    $pedidos = Pedido::where('user_id', auth()->id())
        ->orderBy('id', 'desc')
        ->get();

    return view('backend.usuarios.pedidos', compact('pedidos'));
}
}