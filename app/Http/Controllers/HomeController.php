<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HomeController extends Controller{
 public function index()
{
    session(['ultima_categoria' => url('/inicio')]);

    $productos = Producto::where('destacado', 1)
        ->where('activo', 1)
        ->get();

    return view('inicio', compact('productos'));
}
}