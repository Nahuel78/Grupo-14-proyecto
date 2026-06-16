<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Modape Sport</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>

<body class="body-admin">

<div class="container-fluid p-0">

    <div class="row g-0">

        <!-- SIDEBAR -->
        <nav class="col-md-2 sidebar-admin shadow"
             style="min-height:100vh; background:#031926;">

            <!-- LOGO -->
            <div class="text-center py-4 border-bottom border-secondary">

                <h2 class="text-white fw-bold">
                    Modape Admin
                </h2>

                <small class="text-secondary">
                    Panel de Administración
                </small>

            </div>

            <!-- MENU -->
            <div class="p-3">

                <div class="list-group list-group-flush">

                    <!-- DASHBOARD -->
                    <a href="{{ route('admin.panel') }}"
                       class="list-group-item list-group-item-action border-0 rounded mb-3 text-white fw-bold"
                       style="background:#c9a35d;">

                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard

                    </a>

                    <!-- PRODUCTOS -->
                    <a href="{{ route('admin.productos') }}"
                       class="list-group-item list-group-item-action border-0 bg-transparent text-white mb-3">

                        <i class="bi bi-box-seam me-2"></i>
                        Productos

                    </a>

                    <!-- PEDIDOS -->
                    <a href="{{ route('admin.pedidos') }}"
                       class="list-group-item list-group-item-action border-0 bg-transparent text-white mb-3">

                        <i class="bi bi-cart me-2"></i>
                        Pedidos

                    </a>

                    <!-- CONSULTAS -->
                    <a href="{{ route('admin.consultas') }}"
                         class="list-group-item list-group-item-action border-0 bg-transparent text-white mb-3">

                    <i class="bi bi-envelope me-2"></i>
                         Consultas

                    </a>
                    <!-- CLIENTES -->
                    <a href="{{ route('admin.clientes') }}"
                    class="list-group-item list-group-item-action border-0 bg-transparent text-white mb-3">

                     <i class="bi bi-people me-2"></i>
                        Clientes
                    </a>

                </div>

                <hr class="text-secondary my-4">

               <!-- PERFIL -->
                <a href="{{ route('admin.perfil') }}"
                class="d-flex align-items-center mb-4 text-decoration-none">

                    <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white"
                        style="width:45px; height:45px; background:#c9a35d;">

                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                    </div>

                    <div class="ms-3">

                        <h6 class="text-white mb-0">
                            {{ Auth::user()->name }}
                        </h6>

                        <small class="text-secondary">
                            Administrador
                        </small>

                    </div>

                </a>

                <!-- LOGOUT -->
                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit" class="btn btn-danger w-100 py-2">

                        <i class="bi bi-box-arrow-left me-2"></i>
                        Cerrar Sesión

                    </button>

                </form>

            </div>

        </nav>

        <!-- CONTENIDO -->
        <main class="col-md-10 p-4 bg-light">

            <!-- TITULO -->
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">

                <div>

                    <h1 class="fw-bold mb-1">
                        Bienvenido, {{ Auth::user()->name }} 👋
                    </h1>

                    <p class="text-secondary mb-0">
                        Gestión general de Modape Sport
                    </p>

                </div>

            </div>

            <!-- TARJETAS -->
            <div class="row g-4 mb-4">

                <!-- PRODUCTOS -->
                <div class="col-md-3">

                    <div class="card border-0 shadow-sm h-100"
                         style="border-left:5px solid #c9a35d;">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-secondary fw-bold">
                                    PRODUCTOS
                                </h6>

                                <h2 class="fw-bold">
                                    {{ $totalProductos ?? 124 }}
                                </h2>

                            </div>

                            <i class="bi bi-box-seam fs-1 text-warning"></i>

                        </div>

                    </div>

                </div>

                <!-- PEDIDOS -->
                <div class="col-md-3">

                    <div class="card border-0 shadow-sm h-100"
                         style="border-left:5px solid #198754;">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-secondary fw-bold">
                                    PEDIDOS
                                </h6>

                                <h2 class="fw-bold text-success">
                                    {{ $totalPedidos ?? 18 }}
                                </h2>

                            </div>

                            <i class="bi bi-cart-check fs-1 text-success"></i>

                        </div>

                    </div>

                </div>

                <!-- CLIENTES -->
                <div class="col-md-3">

                    <div class="card border-0 shadow-sm h-100"
                         style="border-left:5px solid #0dcaf0;">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-secondary fw-bold">
                                    CLIENTES
                                </h6>

                                <h2 class="fw-bold text-info">
                                    {{ $clientesActivos ?? 3 }}
                                </h2>

                            </div>

                            <i class="bi bi-people fs-1 text-info"></i>

                        </div>

                    </div>

                </div>

                <!-- VENTAS -->
                <div class="col-md-3">

                    <div class="card border-0 shadow-sm h-100"
                         style="border-left:5px solid #212529;">

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-secondary fw-bold">
                                    VENTAS
                                </h6>

                                <h2 class="fw-bold">
                                    ${{ number_format($totalVentas ?? 350000,0,',','.') }}
                                </h2>

                            </div>

                            <i class="bi bi-wallet2 fs-1 text-dark"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- TABLA PEDIDOS -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header text-white fw-bold py-3"
                     style="background:#031926; border-bottom:3px solid #c9a35d;">

                    <i class="bi bi-receipt me-2"></i>
                    Últimos Pedidos

                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">


                        <thead class="table-light">
                        <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        </tr>

                        </thead>

                        <tbody>

                        @forelse($ultimosPedidos as $pedido)

                        <tr>

                            <td>#{{ $pedido->id }}</td>

                            <td>{{ $pedido->usuario->name }}</td>

                            <td>{{ $pedido->created_at->format('d/m/Y') }}</td>

                            <td>${{ number_format($pedido->total, 0, ',', '.') }}</td>

                            <td>

                                @if($pedido->estado == 'Completado')
                                    <span class="badge bg-success">
                                        {{ $pedido->estado }}
                                    </span>
                                @elseif($pedido->estado == 'Pendiente')
                                    <span class="badge bg-warning text-dark">
                                        {{ $pedido->estado }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ $pedido->estado }}
                                    </span>
                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="5" class="text-center">
                                No hay pedidos registrados
                            </td>
                        </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- ACCESOS RAPIDOS -->
            <div class="card border-0 shadow-sm">

                <div class="card-header text-white fw-bold py-3"
                     style="background:#031926; border-bottom:3px solid #c9a35d;">

                    <i class="bi bi-lightning-charge-fill me-2"></i>
                    Accesos Rápidos

                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <!-- PRODUCTOS -->
                        <div class="col-md-4">

                            <a href="{{ route('admin.productos') }}"
                               class="btn btn-outline-dark w-100 p-4 shadow-sm">

                                <i class="bi bi-box-seam fs-1"></i>

                                <br><br>

                                <span class="fw-bold">
                                    Gestionar Productos
                                </span>

                            </a>

                        </div>

                        <!-- PEDIDOS -->
                        <div class="col-md-4">

                            <a href="{{ route('admin.pedidos') }}"
                               class="btn btn-outline-dark w-100 p-4 shadow-sm">

                                <i class="bi bi-cart-check fs-1"></i>

                                <br><br>

                                <span class="fw-bold">
                                    Revisar Pedidos
                                </span>

                            </a>

                        </div>

                       <!-- VOLVER AL INICIO -->
                        <div class="col-md-4">

                        <a href="{{ url('/') }}"
                        class="btn btn-outline-dark w-100 p-4 shadow-sm">

                         <i class="bi bi-house-door fs-1"></i>

                         <br><br>

                         <span class="fw-bold">
                              Volver al Inicio
                        </span>

                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

