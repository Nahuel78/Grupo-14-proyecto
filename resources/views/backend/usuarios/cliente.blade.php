<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Modape Sport</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}?v=9">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #0d1e2d;">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3 text-warning" href="/inicio">
            Modape Sport
        </a>

        <div class="d-flex align-items-center gap-3 text-white">
            Hola, {{ Auth::user()->name }}

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger btn-sm">Salir</button>
            </form>
        </div>
    </div>
</nav>

<header class="py-5 text-center text-white" style="background:#111;">
    <h1>¡Equipate con lo Mejor!</h1>
</header>

<main class="container my-5">

    <h2 class="mb-4">Novedades</h2>

    <div class="row g-4">

        @if($productos->count() > 0)
            {{ dd($productos) }}
            @foreach($productos as $producto)

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card h-100 shadow-sm border-0">

                        <div class="p-3 text-center">
                            <img src="{{ asset($producto->imagen ?? 'img/default.png') }}"
                                 class="img-fluid"
                                 style="height:200px; object-fit:contain;">
                        </div>

                        <div class="card-body text-center">

                            <h5 class="fw-bold">{{ $producto->nombre }}</h5>

                            <p class="text-muted">
                                ${{ number_format($producto->precio, 0, ',', '.') }}
                            </p>

                            <form action="{{ route('backend.carrito.agregar') }}" method="POST">
                                @csrf

                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                <input type="hidden" name="cantidad" value="1">

                                <button type="submit" class="btn btn-success w-100">
                                    Agregar al carrito
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        @else

            <div class="col-12 text-center">
                <p>No hay productos disponibles</p>
            </div>

        @endif

    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>