<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pedidos - Modape Sport</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold">Gestión de Pedidos</h1>
            <p class="text-secondary mb-0">Administración de pedidos de Modape Sport</p>
        </div>

        <a href="{{ route('admin.panel') }}" class="btn btn-dark">
            <i class="bi bi-arrow-left"></i> Volver al Panel
        </a>

    </div>

    {{-- FILTROS --}}
    <div class="mb-3">

        <a href="?estado=pendiente_pago" class="btn btn-warning btn-sm">Pendientes</a>
        <a href="?estado=enviado" class="btn btn-success btn-sm">Enviados</a>
        <a href="?estado=pagado" class="btn btn-primary btn-sm">Pagados</a>
        <a href="?" class="btn btn-dark btn-sm">Todos</a>

    </div>

    {{-- TABLE --}}
    <div class="card shadow-sm border-0">

        <div class="card-header text-white py-3" style="background:#031926;">
            <div class="fw-bold">
                <i class="bi bi-cart-check me-2"></i>
                Lista de Pedidos
            </div>
        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Método Pago</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Factura</th>
                    </tr>
                </thead>

                <tbody>

                @if($pedidos->count() > 0)

                    @foreach($pedidos as $pedido)
                    <tr id="pedido-{{ $pedido->id }}">

                        <td>#{{ $pedido->id }}</td>

                        <td>
                            {{ $pedido->usuario->name ?? 'Sin usuario' }}
                        </td>

                        <td>
                            {{ $pedido->fecha_venta ? \Carbon\Carbon::parse($pedido->fecha_venta)->format('d/m/Y H:i') : '-' }}
                        </td>

                        <td>
                            {{ $pedido->metodo_pago ?? '-' }}
                        </td>

                        <td>
                            ${{ number_format($pedido->total, 2) }}
                        </td>

                        {{-- ESTADO --}}
                      <td>
    @if($pedido->estado == 'carrito')
        <span class="badge bg-secondary">
            <i class="bi bi-cart me-1"></i> Carrito
        </span>

    @elseif($pedido->estado == 'pendiente_pago')
        <span class="badge bg-warning text-dark">
            <i class="bi bi-hourglass-split me-1"></i> Pendiente pago
        </span>

    @elseif($pedido->estado == 'pagado')
        <span class="badge bg-primary">
            <i class="bi bi-cash-coin me-1"></i> Pagado
        </span>

    @elseif($pedido->estado == 'enviado')
        <span class="badge bg-success">
            <i class="bi bi-truck me-1"></i> Enviado
        </span>

    @elseif($pedido->estado == 'cancelado')
        <span class="badge bg-danger">
            <i class="bi bi-x-circle me-1"></i> Cancelado
        </span>

    @endif

    <form method="POST" action="{{ route('admin.pedidos.estado', $pedido->id) }}">
        @csrf
        @method('PUT')

        <select name="estado" class="form-select form-select-sm mt-2">
            <option value="pendiente_pago" {{ $pedido->estado == 'pendiente_pago' ? 'selected' : '' }}>Pendiente</option>
            <option value="pagado" {{ $pedido->estado == 'pagado' ? 'selected' : '' }}>Pagado</option>
            <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
            <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
        </select>

        <button class="btn btn-sm btn-dark mt-1">
            Cambiar
        </button>
    </form>
</td>


                      

                        {{-- FACTURA --}}
                        <td>
   @if($pedido->estado == 'pagado' || $pedido->estado == 'enviado')
    <a href="{{ route('admin.factura', $pedido->id) }}"
       class="btn btn-sm btn-primary">
        <i class="bi bi-receipt"></i> Factura
    </a>
@else
    <button class="btn btn-sm btn-secondary" disabled>
        Sin factura
    </button>
@endif
</td>
<td>

    @if($pedido->estado == 'cancelado')

        <form action="{{ route('admin.pedidos.eliminar', $pedido->id) }}"
              method="POST"
              onsubmit="return confirm('¿Eliminar este pedido cancelado?')">

            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
                Eliminar
            </button>

        </form>

    @else

        <button class="btn btn-secondary btn-sm" disabled>
            No eliminable
        </button>

    @endif

</td>

                    </tr>

                    @endforeach

                @else

                    <tr>
                        <td colspan="7" class="text-center py-5 text-secondary">
                            <i class="bi bi-cart-x fs-1 d-block mb-3"></i>
                            No hay pedidos registrados.
                        </td>
                    </tr>

                @endif

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>