<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\VentaDetalle;

class VentaCabecera extends Model
{
    protected $table = 'ventas_cabecera';

    protected $fillable = [
    'user_id',
    'estado',
    'total',
    'fecha_venta',
    'metodo_pago',
    'fecha_estimada_entrega',

    'nombre_envio',
    'telefono_envio',
    'provincia',
    'ciudad',
    'direccion',
    'numero',
    'departamento',
    'codigo_postal',
    'referencias'
];

    protected $casts = [
        'fecha_venta' => 'datetime',
    ];

    // Relación: una venta pertenece a un usuario  
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación: una venta tiene muchos items  
    public function detalles()
    {
        return $this->hasMany(VentaDetalle::class, 'venta_id');
    }
}