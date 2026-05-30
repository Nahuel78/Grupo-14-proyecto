<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ClienteController extends Controller
{
    public function index()
    {
        $productos = []; // Después los traemos de la base de datos

        return view('backend.usuarios.cliente', compact('productos')); 
    }
}