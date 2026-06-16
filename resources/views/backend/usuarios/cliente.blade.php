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

<nav class="navbar navbar-expand-lg navbar-dark navbar-modape shadow" style="background-color: #0d1e2d !important; padding: 18px 0 !important; z-index: 1050;">
    <div class="container">

        <!-- LOGO (INICIO) -->
        <a class="navbar-brand fw-bold fs-3" href="{{ route('inicio') }}" style="color: #c5a059 !important;">
            Modape Sport
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavCliente">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavCliente">

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <!-- INICIO -->
                <li class="nav-item px-3">
                    <a class="nav-link active fw-bold text-white" href="{{ route('inicio') }}">
                        Inicio
                    </a>
                </li>

                <li class="nav-item px-3">
                    <a class="nav-link text-white-50 fw-semibold" href="/hombre">Hombre</a>
                </li>

                <li class="nav-item px-3">
                    <a class="nav-link text-white-50 fw-semibold" href="/mujer">Mujer</a>
                </li>

                <li class="nav-item px-3">
                    <a class="nav-link text-white-50 fw-semibold" href="/niños">Niños</a>
                </li>

                <li class="nav-item px-3">
                    <a class="nav-link text-white-50 fw-semibold" href="/accesorios">Accesorios</a>
                </li>

                <!-- 🔥 NUEVO: VOLVER AL CATÁLOGO -->
                <li class="nav-item px-3">
                    <a class="nav-link text-white-50 fw-semibold" href="{{ route('inicio') }}">
                        Catálogo
                    </a>
                </li>

            </ul>

            <div class="d-flex align-items-center gap-3">

                <span class="text-white fw-medium small opacity-90">
                    Hola, {{ Auth::user()->name }} 👋
                </span>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm px-3">
                        <i class="bi bi-box-arrow-right"></i> Salir
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>

<header class="banner-deportivo py-5 text-center text-white shadow-sm">
    <div class="container py-4">
        <h1 class="display-4 fw-bold">¡Equipate con lo Mejor!</h1>
        <p class="lead opacity-75">Explorá nuestro catálogo exclusivo</p>
    </div>
</header>

<main class="container my-5">

    <!-- PANEL CLIENTE (INTACTO) -->
    <div class="card border-0 shadow-sm mb-5">

        <div class="card-body p-4">

            <div class="row align-items-center">

                <div class="col-md-6">
                    <h3 class="fw-bold mb-1">Mi Cuenta</h3>
                    <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                    <small class="text-secondary">{{ Auth::user()->email }}</small>
                </div>

                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <span class="badge bg-dark p-2">
                        Cliente desde {{ Auth::user()->created_at->format('d/m/Y') }}
                    </span>
                </div>

            </div>

            <hr>

            <div class="row g-3">

                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-cart3 fs-1"></i>
                            <h5 class="mt-3">Mi Carrito</h5>
                            <a href="#" class="btn btn-warning">Ver carrito</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-box-seam fs-1"></i>
                            <h5 class="mt-3">Mis Pedidos</h5>
                            <a href="{{ route('cliente.pedidos') }}" class="btn btn-primary">Ver pedidos</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-shop fs-1"></i>
                            <h5 class="mt-3">Productos</h5>
                            <a href="{{ route('inicio') }}" class="btn btn-dark">Ir al catálogo</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-person-circle fs-1"></i>
                            <h5 class="mt-3">Mi Perfil</h5>
                            <a href="{{ route('cliente.perfil') }}" class="btn btn-secondary">Editar perfil</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- TITULO -->
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h2 class="fw-bold text-dark mb-0">Novedades Destacadas</h2>
    </div>

    <!-- PRODUCTOS (ARREGLADO) -->
    <div class="row g-4">


      @if(isset($productos) && count($productos) > 0)

    @foreach($productos as $producto)

        <div class="col-12 col-md-6 col-lg-4 col-xl-4">

            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden bg-white card-producto-sport">

                <div class="d-flex align-items-center justify-content-center bg-white"
                     style="height: 260px; padding: 15px;">

                    <img src="{{ asset($producto->url_imagen) }}"
                         class="img-fluid h-100"
                         style="object-fit: contain;"
                         alt="{{ $producto->nombre }}">

                </div>

                <div class="card-body d-flex flex-column justify-content-between p-3">

                    <div>
                        <span class="badge bg-dark mb-2 rounded-1 small">Producto</span>

                        <h5 class="card-title fw-bold text-dark mb-1">
                            {{ $producto->nombre }}
                        </h5>

                        <p class="card-text text-muted small mb-3">
                            ${{ number_format($producto->precio,0,',','.') }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                        <button class="btn btn-sm text-white px-3 fw-medium"
                                style="background-color: #0d1e2d; border-radius: 4px;">
                            <i class="bi bi-eye me-1"></i> Ver
                        </button>
                    </div>

                </div>

            </div>

        </div>

    @endforeach

@else
<div class="col-12 col-md-6 col-lg-4 col-xl-4">
    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden bg-white card-producto-sport">
        <div class="d-flex align-items-center justify-content-center bg-white" style="height: 260px; padding: 15px;">
            <img src="{{ asset('img/zapatillas/zapanikenegra.png') }}" class="img-fluid h-100" style="object-fit: contain;" alt="Zapatillas Nike Air Max">
        </div>
        <div class="card-body d-flex flex-column justify-content-between p-3">
            <div>
                <span class="badge bg-dark mb-2 rounded-1 small">Calzado / Running</span>
                <h5 class="card-title fw-bold text-dark mb-1">Zapatillas Nike Air Max</h5>
                <p class="card-text text-muted small mb-3">Estilo urbano y amortiguación premium totalmente en negro.</p>
            </div>
            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                <span class="fs-5 fw-bold text-dark">$150.000</span>
                <button class="btn btn-sm text-white px-3 fw-medium" style="background-color: #0d1e2d;">
                    <i class="bi bi-eye me-1"></i> Ver
                </button>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-md-6 col-lg-4 col-xl-4">
    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden bg-white card-producto-sport">
        <div class="d-flex align-items-center justify-content-center bg-white" style="height: 260px; padding: 15px;">
            <img src="{{ asset('img/ropa/buzoadidasliverpol.png') }}" class="img-fluid h-100" style="object-fit: contain;" alt="Buzo Adidas Liverpool">
        </div>
        <div class="card-body d-flex flex-column justify-content-between p-3">
            <div>
                <span class="badge bg-dark mb-2 rounded-1 small">Indumentaria / Urbano</span>
                <h5 class="card-title fw-bold text-dark mb-1">Buzo Adidas Liverpool Retro</h5>
                <p class="card-text text-muted small mb-3">Diseño clásico de Carlsberg con detalles verdes y blancos.</p>
            </div>
            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                <span class="fs-5 fw-bold text-dark">$80.000</span>
                <button class="btn btn-sm text-white px-3 fw-medium" style="background-color: #0d1e2d;">
                    <i class="bi bi-eye me-1"></i> Ver
                </button>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-md-6 col-lg-4 col-xl-4">
    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden bg-white card-producto-sport">
        <div class="d-flex align-items-center justify-content-center bg-white" style="height: 260px; padding: 15px;">
            <img src="{{ asset('img/ninos/botinadidasniño2.png') }}" class="img-fluid h-100" style="object-fit: contain;" alt="Botines Adidas Predator">
        </div>
        <div class="card-body d-flex flex-column justify-content-between p-3">
            <div>
                <span class="badge bg-dark mb-2 rounded-1 small">Calzado / Fútbol Niños</span>
                <h5 class="card-title fw-bold text-dark mb-1">Botines Adidas Predator</h5>
                <p class="card-text text-muted small mb-3">Diseño rojo y blanco con tapones para máxima velocidad en cancha.</p>
            </div>
            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                <span class="fs-5 fw-bold text-dark">$70.000</span>
                <button class="btn btn-sm text-white px-3 fw-medium" style="background-color: #0d1e2d;">
                    <i class="bi bi-eye me-1"></i> Ver
                </button>
            </div>
        </div>
    </div>
</div>

@endif

    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>