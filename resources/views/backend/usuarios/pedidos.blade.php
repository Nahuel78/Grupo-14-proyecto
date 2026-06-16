<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos - Modape Sport</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    {{-- BOTÓN VOLVER --}}
    <a href="{{ url('/') }}" class="btn btn-dark mb-4">
        <i class="bi bi-house"></i> Volver al inicio
    </a>

    {{-- CARD PRINCIPAL --}}
    <div class="card shadow-sm border-0">

        {{-- HEADER --}}
        <div class="card-header text-white py-4"
             style="background:#031926;">

            <h3 class="mb-0 fw-bold">
                <i class="bi bi-box-seam me-2"></i>
                Mis Pedidos
            </h3>

        </div>

        </div>

        <div class="card-body">

        @if($pedidos->count() > 0)

            @foreach($pedidos as $pedido)

            <div class="card mb-4 border">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <strong>
                        Pedido #{{ $pedido->id }}
                    </strong>

                    {{-- ESTADO --}}
                    @if($pedido->estado == 'pendiente_pago')
                        <span class="badge bg-warning text-dark">Pendiente</span>

                    @elseif($pedido->estado == 'pagado')
                        <span class="badge bg-primary">Pagado</span>

                    @elseif($pedido->estado == 'enviado')
                        <span class="badge bg-success">Enviado</span>

                    @elseif($pedido->estado == 'cancelado')
                        <span class="badge bg-danger">Cancelado</span>

                    @else
                        <span class="badge bg-secondary">
                            {{ ucfirst($pedido->estado) }}
                        </span>
                    @endif

                </div>

                <div class="card-body">

                    <p>
                        <strong>Fecha:</strong>
                        {{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y H:i') }}
                    </p>
                 @if($pedido->estado === 'enviado')
    <div class="alert alert-info py-2 mt-2">
        🚚 Llega aproximadamente el 
        <strong>
            {{ $pedido->fecha_estimada_entrega
                ? \Carbon\Carbon::parse($pedido->fecha_estimada_entrega)->format('d/m/Y')
                : 'Calculando fecha...' }}
        </strong>
    </div>
@endif

                    <p>
                        <strong>Método de pago:</strong>
                        {{ $pedido->metodo_pago ?? 'No especificado' }}
                    </p>

                    <table class="table table-sm">

                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($pedido->detalles as $detalle)

                            <tr>
                                <td>{{ $detalle->producto->nombre ?? 'Producto eliminado' }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>${{ number_format($detalle->subtotal,2) }}</td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                    <div class="text-end">

                        <h5>
                            Total:
                            ${{ number_format($pedido->total,2) }}
                        </h5>

                      {{-- FACTURA DISPONIBLE PARA PAGADO O ENVIADO --}}
@if(in_array($pedido->estado, ['pagado', 'enviado']))
    <a href="{{ route('factura', $pedido->id) }}"
       class="btn btn-sm btn-primary">
        <i class="bi bi-receipt"></i> Factura
    </a>
@else
    <button class="btn btn-sm btn-secondary" disabled>
        Sin factura
    </button>
@endif

                    </div>

                </div>

            </div>

            @endforeach

        @else

            <div class="text-center py-5">

                <i class="bi bi-cart-x"
                   style="font-size:70px;color:#6c757d;"></i>

                <h4 class="mt-4">
                    No tienes pedidos realizados
                </h4>

                <p class="text-muted">
                    Cuando realices una compra podrás consultar
                    aquí el estado de tus pedidos.
                </p>

                <a href="{{ url('/cliente') }}"
                   class="btn btn-dark mt-3">

                    <i class="bi bi-arrow-left"></i>
                    Volver a la Tienda

                </a>

            </div>

        @endif

        </div>

    </div>

</div>

</body>
</html>