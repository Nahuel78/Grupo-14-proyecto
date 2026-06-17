<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
    'nombre',
    'descripcion',
    'precio',
    'stock',
    'marca',
    'talle',
    'categoria',
    'subcategoria',
    'url_imagen',
    'activo',
    'destacado'
];

public function detallesPedido()
     {
    return $this->hasMany(DetallePedido::class);
     }
}