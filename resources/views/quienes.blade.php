<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Quiénes Somos - Modape Sport</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>

 <header class="header">

    <div class="titulo-box">
        <img src="{{ asset('img/fondito1.png') }}" class="fondo-img">
        <h1 class="titulo">Modape Sport</h1>
    </div>

    <div class="frase-header">
        <h2>Tu estilo, tu gusto, lo encontras en la mejor tienda</h2>
    </div>

    <div class="top-icons" style="display: flex; align-items: center; gap: 12px;">

    @auth

        <div style="text-align: right; line-height: 1.2; max-width: 130px; color: white; font-size: 14px; margin-right: 4px;">
            <span>Hola,</span><br>
            <strong>{{ auth()->user()->name }}</strong>
        </div>

        <div class="dropdown menu-usuario">

           @if(auth()->check() && strtolower(auth()->user()->rol) === 'admin')

                <a href="#" class="icono user dropdown-toggle"
                   data-bs-toggle="dropdown">
                    <i class="bi bi-shield-lock-fill"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('admin.panel') }}">
                            Panel Admin
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                           href="{{ route('admin.perfil') }}">
                            Mi Perfil
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>

            @else

                <a href="#" class="icono user dropdown-toggle"
                   data-bs-toggle="dropdown">
                    <i class="bi bi-person-check-fill"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                         href="{{ route('cliente') }}">
                         Panel Cliente
                         </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                           href="{{ route('cliente.perfil') }}">
                            Mi Perfil
                        </a>
                    </li>

                         <li>
                        <a class="dropdown-item"
                        href="{{ route('cliente.pedidos') }}">
                        Mis Pedidos
                    </a>
                </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                Cerrar Sesión
                            </button>
                        </form>
                    </li>

                </ul>

            @endif

        </div>

    @else

        <a href="{{ route('login') }}"
           class="icono user"
           title="Iniciar Sesión">
            <i class="bi bi-person"></i>
        </a>

    @endauth

    @auth

    @if(strtolower(auth()->user()->rol) !== 'admin')
        <a href="{{ route('cliente.carrito') }}" class="icono cart">
    <i class="bi bi-bag"></i>
    <span class="cart-count">{{ $cantidadCarrito ?? 0 }}</span>
</a>
    @endif

@else

    <a href="/carrito" class="icono cart">
        <i class="bi bi-bag"></i>
        <span class="cart-count">0</span>
    </a>

@endauth
</div>

</header>


<nav>

<div class="menu">

<a href="/inicio">Inicio</a>

<div class="dropdown">
<a href="/hombre">Hombre</a>
<div class="submenu">
<a href="/hombre/ropa">Ropas</a>
<a href="/hombre/zapatillas">Zapatillas</a>
<a href="/hombre/botines">Botines</a>
</div>
</div>

<div class="dropdown">
<a href="/mujer">Mujer</a>
<div class="submenu">
<a href="/mujer/ropa">Ropas</a>
<a href="/mujer/zapatillas">Zapatillas</a>
<a href="/mujer/accesorios">Accesorios</a>
</div>
</div>

<div class="dropdown">
<a href="/niños">Niños</a>
<div class="submenu">
<a href="/niños/ropa">Ropas</a>
<a href="/niños/zapatillas">Zapatillas</a>
<a href="/niños/botines">Botines</a>
</div>
</div>

<div class="dropdown">
<a href="/accesorios">Accesorios</a>
<div class="submenu">
<a href="/accesorios/mochila">Mochila</a>
<a href="/accesorios/medias">Medias</a>
<a href="/accesorios/pelotas">Pelotas</a>
<a href="/accesorios/gorras">Gorras</a>
<a href="/accesorios/paletas">Paletas</a>
</div>
</div>


<form class="barra-busqueda">
<input type="text" placeholder="Buscar productos...">
<button type="submit">🔍</button>
</form>

</div>

</nav>

<section class="quienes-somos">

<h1>Quiénes Somos</h1>

<p>
Somos una tienda dedicada a la venta de indumentaria moderna y de calidad.
Nuestro objetivo es ofrecer a nuestros clientes prendas cómodas, actuales y a
buen precio, acompañadas de una excelente atención.
</p>

<h2>Nuestra historia</h2>

<p>
Nuestra empresa comenzó como un pequeño emprendimiento con la idea de
acercar las últimas tendencias de moda a nuestros clientes. Con el tiempo,
hemos crecido gracias a la confianza de quienes nos eligen día a día.
</p>

<h2>Nuestro objetivo</h2>

<p>
Buscamos brindar productos de calidad, mejorar constantemente nuestro
servicio y ofrecer una experiencia de compra sencilla y segura.
</p>

<h2>Nuestro equipo</h2>

<ul>
<li>Gerente General</li>
<li>Área de Ventas</li>
<li>Área de Atención al Cliente</li>
<li>Área de Logística y Envíos</li>
</ul>

</section>

@include('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>