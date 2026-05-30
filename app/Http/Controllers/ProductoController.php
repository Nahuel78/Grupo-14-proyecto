<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function gestionarProductos()
    {
        $productos = Producto::all();

        return view('backend.admin.productos', compact('productos'));
    }
}