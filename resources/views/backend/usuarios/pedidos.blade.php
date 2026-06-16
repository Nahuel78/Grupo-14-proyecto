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

    <div class="card shadow-sm border-0">

        <div class="card-header text-white py-3"
             style="background:#031926;">

            <h3 class="mb-0">
                <i class="bi bi-box-seam me-2"></i>
                Mis Pedidos
            </h3>

        </div>

       <div class="card-body">

@if($pedidos->isEmpty())

    <div class="text-center py-5">

        <i class="bi bi-cart-x"
           style="font-size:70px;color:#6c757d;"></i>

        <h4 class="mt-4">
            No tienes pedidos realizados
        </h4>

    </div>

@else

<table class="table table-striped">

    <thead>
        <tr>
            <th># Pedido</th>
            <th>Total</th>
            <th>Estado</th>
        </tr>
    </thead>

    <tbody>

        @foreach($pedidos as $pedido)

        <tr>
            <td>{{ $pedido->id }}</td>
            <td>${{ number_format($pedido->total,0,',','.') }}</td>
            <td>{{ $pedido->estado }}</td>
        </tr>

        @endforeach

    </tbody>

</table>

@endif

</div>

    </div>

</div>

</body>
</html>