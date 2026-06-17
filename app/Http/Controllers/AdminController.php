<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\VentaCabecera;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios = User::all();

        $totalUsuarios = User::count();

        $clientesActivos = User::where('rol', 'cliente')->count();

        $totalProductos = Producto::count();

        // Cuando tengas pedidos reales
     $totalPedidos = VentaCabecera::whereIn('estado', ['pagado', 'enviado'])
    ->count();

$totalVentas = VentaCabecera::whereIn('estado', ['pagado', 'enviado'])
    ->sum('total');

$ultimosPedidos = VentaCabecera::with('usuario')
    ->where('estado', 'pagado')
    ->latest()
    ->take(5)
    ->get();
        return view('backend.admin.dashboard', compact(
            'usuarios',
            'totalUsuarios',
            'clientesActivos',
            'totalProductos',
            'totalPedidos',
            'totalVentas',
            'ultimosPedidos'
        ));
    }

    public function mostrarPanel()
    {
        return $this->dashboard();
    }

    public function editarPerfil()
    {
        return view('backend.admin.editar-perfil');
    }

 public function actualizarPerfil(Request $request)
{
    $user = Auth::user();

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()
        ->route('admin.perfil')
        ->with('success', 'Perfil actualizado correctamente');
}

public function clientes()
{
    $clientes = User::where('rol', 'cliente')->get();

    return view('backend.admin.clientes', compact('clientes'));
}

  public function pedidos(Request $request)
{
    $pedidos = VentaCabecera::with(['usuario', 'detalles.producto'])
        ->where('estado', '!=', 'carrito') // Ocultar carritos en proceso
        ->when($request->estado, function ($q) use ($request) {
            $q->where('estado', $request->estado);
        })
        ->orderBy('id', 'desc')
        ->get();

    return view('backend.admin.pedidos', compact('pedidos'));
}

public function cambiarEstado(Request $request, $id)
{
    $pedido = VentaCabecera::findOrFail($id);

    $estado = strtolower(trim($request->estado));

    $pedido->estado = $estado;

    if ($estado === 'enviado') {
        $pedido->fecha_estimada_entrega = now()->addDays(rand(3, 7));
    }

    $pedido->save(); 

    return back()->with('success', 'Estado actualizado correctamente');
}

public function eliminarPedido($id)
{
    $pedido = VentaCabecera::with('detalles')->findOrFail($id);

    // 🔴 SOLO PERMITIR CANCELADOS
    if ($pedido->estado !== 'cancelado') {
        return back()->with('error', 'Solo se pueden eliminar pedidos cancelados.');
    }

    // eliminar detalles primero
    $pedido->detalles()->delete();

    // eliminar cabecera
    $pedido->delete();

    return back()->with('success', 'Pedido cancelado eliminado correctamente.');
}
}