<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function dashboard() 
{
    $usuarios = User::all();
    $totalUsuarios = $usuarios->count();
    $totalProductos = 124; 
    $totalPedidos = 18;
    $totalVentas = 350000;

    return view('backend.admin.dashboard', compact(
        'usuarios', 'totalUsuarios', 'totalProductos', 'totalPedidos', 'totalVentas'
    ));
}

// Podés borrar mostrarPanel() o simplemente hacer que llame al mismo:
public function mostrarPanel() {
    return $this->dashboard();
}
}