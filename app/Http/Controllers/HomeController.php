<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HomeController extends Controller{
    public function index()
    {
        $productos = Producto::where('destacado', 1)->get();

        return view('inicio', compact('productos'));
    }
}