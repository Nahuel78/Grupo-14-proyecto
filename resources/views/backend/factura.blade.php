@extends('layouts.app')

@section('content')

<style>
.factura-container{
    max-width:1000px;
    margin:30px auto;
    background:#fff;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 4px 18px rgba(0,0,0,.08);
}

.factura-header{
    background:#0b2545;
    color:white;
    padding:25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.factura-header h1{
    margin:0;
    font-size:32px;
    font-weight:700;
}

.factura-header h4{
    margin:0;
}

.factura-body{
    padding:25px;
}

.info-factura{
    display:flex;
    justify-content:space-between;
    margin-bottom:25px;
    flex-wrap:wrap;
}

.info-box{
    margin-bottom:10px;
}

.info-box strong{
    color:#0b2545;
}

.tabla-factura{
    width:100%;
    border-collapse:collapse;
}

.tabla-factura th{
    background:#0b2545;
    color:white;
    padding:14px;
    text-align:center;
}

.tabla-factura td{
    padding:14px;
    border-bottom:1px solid #e5e7eb;
    text-align:center;
}

.tabla-factura tr:hover{
    background:#f8fbff;
}

.total-box{
    margin-top:25px;
    text-align:right;
}

.total-box h2{
    color:#0b2545;
    font-size:30px;
    margin:0;
}

.acciones{
    margin-top:30px;
    display:flex;
    gap:10px;
    justify-content:center;
    flex-wrap:wrap;
}

.btn-modape{
    background:#0b2545;
    color:white;
    border:none;
    padding:12px 22px;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
    cursor:pointer;
    transition:.2s;
}

.btn-modape:hover{
    background:#133c72;
    color:white;
    transform:translateY(-2px);
}
.logo-factura{
    display:flex;
    align-items:center;
    gap:15px;
}

.logo-factura img{
    width:80px;
}

.texto-logo h1{
    margin:0;
    color:white;
    font-size:32px;
    font-weight:800;
    letter-spacing:2px;
}

.texto-logo small{
    font-size:14px;
    color:#dbeafe;
}

@media(max-width:768px){

    .factura-header{
        flex-direction:column;
        text-align:center;
        gap:10px;
    }

    .info-factura{
        flex-direction:column;
    }

    .tabla-factura{
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }
}
</style>

<div class="factura-container">

    <div class="factura-header">

        <div class="logo-factura">
    <img src="{{ asset('img/fondito1.png') }}" class="fondo-img">
        

     <div class="texto-logo">
        <h1>MODAPE</h1>
        <small>SPORT</small>
    </div>
</div>

        <div>
            <h4>Factura #{{ $venta->id }}</h4>
        </div>

    </div>

    <div class="factura-body">

        <div class="info-factura">

            <div class="info-box">
                <strong>Cliente:</strong><br>
                {{ $venta->usuario->name }}
            </div>

            <div class="info-box">
                <strong>Fecha:</strong><br>
                {{ $venta->fecha_venta }}
            </div>

            <div class="info-box">
                <strong>Método de Pago:</strong><br>
                {{ $venta->metodo_pago }}
            </div>

        </div>

        <table class="tabla-factura">

        <hr class="my-4">

<h4 style="color:#0b2545;font-weight:700;">
    📦 Información de Envío
</h4>

      <div class="row mt-3">

    <div class="col-md-6 mb-3">
        <div class="border rounded p-3 h-100">
            <h6 class="fw-bold mb-3" style="color:#0b2545;">
                Destinatario
            </h6>

            <p class="mb-1">
                <strong>Nombre:</strong>
                {{ $venta->nombre_envio }}
            </p>

            <p class="mb-1">
                <strong>Teléfono:</strong>
                {{ $venta->telefono_envio }}
            </p>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="border rounded p-3 h-100">
            <h6 class="fw-bold mb-3" style="color:#0b2545;">
                Dirección de Entrega
            </h6>

            <p class="mb-1">
                <strong>Provincia:</strong>
                {{ $venta->provincia }}
            </p>

            <p class="mb-1">
                <strong>Ciudad:</strong>
                {{ $venta->ciudad }}
            </p>

            <p class="mb-1">
                <strong>Dirección:</strong>
                {{ $venta->direccion }}
            </p>

            <p class="mb-1">
                <strong>Número:</strong>
                {{ $venta->numero }}
            </p>

            <p class="mb-1">
                <strong>Departamento:</strong>
                {{ $venta->departamento }}
            </p>

            <p class="mb-0">
                <strong>Código Postal:</strong>
                {{ $venta->codigo_postal }}
            </p>
        </div>
    </div>

</div>

@if($venta->referencias)
<div class="border rounded p-3 mb-4">
    <h6 class="fw-bold mb-2" style="color:#0b2545;">
        Referencias para la entrega
    </h6>

    <p class="mb-0">
        {{ $venta->referencias }}
    </p>
</div>
@endif

            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>

                @foreach($venta->detalles as $detalle)

                <tr>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ number_format($detalle->precio_unitario,2) }}</td>
                    <td>${{ number_format($detalle->subtotal,2) }}</td>
                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="total-box">
            <h2>
                Total: ${{ number_format($venta->total,2) }}
            </h2>
        </div>

        <div class="acciones">

    <button onclick="window.print()" class="btn-modape">
        🖨 Imprimir Factura
    </button>

    @auth
        @if(strtolower(auth()->user()->rol) === 'admin')

            <a href="{{ route('admin.pedidos') }}" class="btn-modape">
          📦 Volver a Pedidos
          </a>

        @else

            <a href="{{ route('cliente.pedidos') }}" class="btn-modape">
            📋 Volver a Mis Pedidos
        </a>

        @endif
    @endauth

      </div>
</div>

</div>

@endsection