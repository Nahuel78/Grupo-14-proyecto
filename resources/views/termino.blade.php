<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Términos y Condiciones - Modape Sport</title>

<p><strong>Última actualización:</strong> 2026</p>

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
<div class="contenedor-terminos">

<h2>Términos y Condiciones</h2>

<p>
Al acceder y utilizar el sitio web de Modape Sport, el usuario acepta cumplir con
los presentes términos y condiciones de uso. Estos términos regulan la navegación,
compra de productos y uso de los servicios ofrecidos en el sitio.
</p>

<h3>Uso del sitio web</h3>

<p>
El usuario se compromete a utilizar el sitio web de manera responsable y a no
realizar actividades que puedan afectar el funcionamiento del mismo.
</p>

<h3>Política de privacidad</h3>

<p>
Los datos personales proporcionados por los usuarios serán utilizados únicamente
para gestionar compras, responder consultas y mejorar nuestros servicios.
Modape Sport se compromete a proteger la información personal de los usuarios.
</p>

<h3>Compra de productos</h3>

<p>
Los productos ofrecidos en el sitio web pueden adquirirse a través del sistema de
compra disponible en la plataforma. Los precios y disponibilidad pueden variar
sin previo aviso.
</p>

<h3>Formas de entrega</h3>

<p>
Las entregas se realizan mediante servicios de envío a domicilio o retiro en punto
de entrega según disponibilidad. Los tiempos de entrega pueden variar dependiendo
de la ubicación del cliente.
</p>

<h3>Garantía</h3>

<p>
Todos los productos cuentan con garantía por defectos de fabricación. En caso de
presentar inconvenientes, el cliente podrá comunicarse con nuestro servicio de
soporte para gestionar el cambio o devolución.
</p>

<h3>Soporte postventa</h3>

<p>
Para consultas, reclamos o asistencia posterior a la compra, los usuarios pueden
contactarse a través de la sección de contacto disponible en el sitio.
</p>

</div>

@include('footer')

</body>
</html>