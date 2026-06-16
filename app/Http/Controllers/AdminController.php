<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios = User::all();

        $totalUsuarios = User::count();

        $clientesActivos = User::where('rol', 'cliente')->count();

        $totalProductos = Producto::count();

        // Cuando tengas pedidos reales
        $totalPedidos = Pedido::count();

        $totalVentas = Pedido::sum('total');

        $ultimosPedidos = Pedido::with('usuario')
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

    public function clientes(){
    $clientes = User::where('rol', 'cliente')->get();

    return view('backend.admin.clientes', compact('clientes'));
    }
}