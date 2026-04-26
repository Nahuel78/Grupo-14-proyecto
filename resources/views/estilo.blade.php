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

    <div class="frase-header">
        <h2>Tu estilo, tu gusto, lo encontras en la mejor tienda</h2>
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
                <a href="/hombre/ropa">Ropa</a>
                <a href="/hombre/zapatillas">Zapatillas</a>
                <a href="/hombre/botines">Botines</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="/mujer">Mujer</a>
            <div class="submenu">
                <a href="/mujer/ropa">Ropa</a>
                <a href="/mujer/zapatillas">Zapatillas</a>
                <a href="/mujer/accesorios">Accesorios</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="/niños">Niños</a>
            <div class="submenu">
                <a href="/niños/ropa">Ropa</a>
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

    @include('carrusel')

    @include('seccion-productos')

    <section class="promo">

    <h2>🔥 Ofertas de la Semana 🔥</h2>

    <p>Hasta 30% de descuento en zapatillas seleccionadas.</p>

    <a href="/hombre/zapatillas" class="btn-promo">Ver productos</a>

    </section>


    <section class="marcas">

    <div class="marcas-img">
    <img src="{{ asset('img/marcas/NikeLogowhite.png') }}" alt="Marcas que trabajamos">
    <img src="{{ asset('img/marcas/Adidas-logo.png') }}">
    <img src="{{ asset('img/marcas/PumaLogo.png') }}">
    <img src="{{ asset('img/marcas/newbalancelogo.png') }}">
    <img src="{{ asset('img/marcas/kappalogo.png') }}">

    </div>

    </section>

    <section class="beneficios">

    <div class="beneficio">
    <h3>🚚 Envíos a todo el país</h3>
    <p>Recibí tus productos donde estés.</p>
    </div>

    <div class="beneficio">
    <h3>💳 Pagos seguros</h3>
    <p>Pagá con tarjeta o transferencia.</p>
    </div>

    <div class="beneficio">
    <h3>🔄 Cambios y devoluciones</h3>
    <p>Garantía en todos nuestros productos.</p>
    </div>

    </section>

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

<script>
    const toggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');

    toggle.addEventListener('click', () => {
        menu.classList.toggle('active');
    });

    // dropdown en celular
    document.querySelectorAll('.dropdown > a').forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                this.parentElement.classList.toggle('active');
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>