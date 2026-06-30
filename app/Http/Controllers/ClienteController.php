<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Pedido;

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
    $user = Auth::user();

    return view('backend.usuarios.editar-perfil', compact('user'));
}

public function actualizarPerfil(Request $request)
{
    $request->validate([
        'name' => 'required',
        'apellido' => 'nullable|string|max:255',
        'telefono' => 'nullable|string|max:20',
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        'direccion' => 'nullable|string|max:255',
        'ciudad' => 'nullable|string|max:255',
        'provincia' => 'nullable|string|max:255',
        'codigo_postal' => 'nullable|string|max:20',
        'password' => 'nullable|confirmed|min:6'
    ]);

    $user = Auth::user();

    $user->name = $request->name;
    $user->apellido = $request->apellido;
    $user->telefono = $request->telefono;
    $user->email = $request->email;
    $user->direccion = $request->direccion;
    $user->ciudad = $request->ciudad;
    $user->provincia = $request->provincia;
    $user->codigo_postal = $request->codigo_postal;

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