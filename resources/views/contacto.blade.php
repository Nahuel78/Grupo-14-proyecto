<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contacto - Modape Sport</title>

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

<h2 class="titulo-contacto">📩 Contáctanos</h2>

<div class="info-contacto">

<p><strong>Titular:</strong> Modape Sport S.A.</p>
<p><strong>Razón social:</strong> Venta de indumentaria deportiva</p>
<p><strong>Domicilio:</strong> Corrientes, Argentina</p>
<p><strong>Teléfono:</strong> +54 379 XXX XXXX</p>
<p><strong>Email:</strong> contacto@modapesport.com</p>

</div>

<form action="/contacto" method="POST" class="form-contacto">

@csrf

<label>Nombre:</label>
<input type="text" name="nombre" required>

<label>Email:</label>
<input type="email" name="email" required>

<label>Mensaje:</label>
<textarea name="mensaje" required></textarea>

<button type="submit">Enviar</button>

</form>

@include('footer')

</body>
</html>