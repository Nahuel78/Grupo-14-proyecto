<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modape Sport</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}?v=3">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
   <header class="header">

    <div class="titulo-box">
        <img src="{{ asset('img/fondito1.png') }}" class="fondo-img">
        <h1 class="titulo">Modape Sport</h1>
    </div>

    <div class="top-icons">
        <a href="/login" class="icono user">
            <i class="bi bi-person"></i>
        </a>

        <a href="/carrito" class="icono cart">
            <i class="bi bi-bag"></i>
            <span class="cart-count">0</span>
        </a>
    </div>

</header>

<nav>
   
    <div class="menu">

        <a href="/">Inicio</a>

        <div class="dropdown">
            <a href="/hombre">Hombre</a>
            <div class="submenu">
                <a href="/hombre/zapatillas">Zapatillas</a>
                <a href="/hombre/ropa">Ropa</a>
                <a href="/hombre/botines">Botines</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="/mujer">Mujer</a>
            <div class="submenu">
                <a href="/mujer/zapatillas">Zapatillas</a>
                <a href="/mujer/ropa">Ropa</a>
                <a href="/mujer/accesorios">Accesorios</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="/niños">Niños</a>
            <div class="submenu">
                <a href="/niños/zapatillas">Zapatillas</a>
                <a href="/niños/ropa">Ropa</a>
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

    @include('carrusel')

    @include('seccion-productos')

    @include('footer')

<script>
    let contador = 0;

    const botones = document.querySelectorAll(".agregar-carrito");
    const carrito = document.querySelector(".cart-count");

    botones.forEach(boton => {
        boton.addEventListener("click", () => {
            contador++;
            carrito.textContent = contador;
        });
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>