<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\VentaCabecera;
use App\Models\User;

class ClienteController extends Controller
{
    public function index()
{
    $productos = [];

    $cantidadCarrito = 0;

    $carrito = VentaCabecera::where('user_id', Auth::id())
        ->where('estado', 'carrito')
        ->first();

    if ($carrito) {
        $cantidadCarrito = $carrito->detalles()->sum('cantidad');
    }
     $cantidadPedidos = VentaCabecera::where('user_id', Auth::id())
    ->where('estado', 'pagado')
    ->count();

    return view('backend.usuarios.cliente', compact(
        'productos',
        'cantidadCarrito',
        'cantidadPedidos'

    ));
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

   $user = User::find(Auth::id());

$user->name = $request->name;
$user->email = $request->email;

if ($request->filled('password')) {
    $user->password = Hash::make($request->password);
}

$user->save();

    return redirect()
        ->route('cliente.perfil')
        ->with('success', 'Perfil actualizado correctamente');
}

public function misPedidos()
{
    $pedidos = VentaCabecera::with('detalles.producto')
        ->where('user_id', Auth::id())
        ->where('estado', '!=', 'carrito') 
        ->orderBy('id', 'desc')
        ->get();

    return view('backend.usuarios.pedidos', compact('pedidos'));
}
}