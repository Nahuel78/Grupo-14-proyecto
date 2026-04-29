<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Zapatillas Mujer - Modape Sport</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
<link rel="stylesheet" href="{{ asset('css/hombre.css') }}">
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
<a href="/mujer/ropa">Ropa</a>
<a href="/mujer/zapatillas">Zapatillas</a>
<a href="/mujer/accesorios">Accesorios</a>

<form class="barra-busqueda">
<input type="text" placeholder="Buscar productos...">
<button type="submit">🔍</button>
</form>

</div>

</nav>

<h2 class="titulo-productos">⭐⭐Zapatillas⭐⭐</h2>

<div class="filtros">

<button onclick="filtrar('todos')">Todos</button>
<button onclick="filtrar('nike')">Nike</button>
<button onclick="filtrar('adidas')">Adidas</button>
<button onclick="filtrar('puma')">Puma</button>

</div>


<!-- PRODUCTOS -->

<div class="contenedor-productos">

<div class="producto" data-marca="nike">
<img src="{{ asset('img/zapatillasmujer/ZapatillasRunningnike.png') }}">
<h3>Zapatillas Nike Running</h3>
<p class="precio">$130.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="Puma">
<img src="{{ asset('img/zapatillasmujer/ZapatillasPumaStreet.png') }}">
<h3>Zapatillas Puma Street </h3>
<p class="precio">$90.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/zapatillasmujer/ZapatillasadidasGC.png') }}">
<h3>Zapatilla Adidas GC</h3>
<p class="precio">$120.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/zapatillasmujer/Zapatilla nike blazer.png') }}">
<h3>Zapatilla Nike Blazer</h3>
<p class="precio">$150.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/zapatillasmujer/Zapatilla Puma CA.png') }}">
<h3>Zapatilla Puma CA</h3>
<p class="precio">$120.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/zapatillasmujer/Zapatilla Puma Pro.png') }}">
<h3>Zapatilla Puma Pro</h3>
<p class="precio">$125.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/zapatillasmujer/zapatillasnikeairmax.png') }}">
<h3>Zapatilla nike airmax</h3>
<p class="precio">$160.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/zapatillasmujer/Zapatillapuma carina.png') }}">
<h3>Zapatilla Puma Blanca</h3>
<p class="precio">$135.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>


<div class="producto" data-marca="adidas">
<img src="{{ asset('img/zapatillasmujer/ZapatillasRunningGalaxyNegro.png') }}">
<h3>Zapatilla Running Galaxy</h3>
<p class="precio">$145.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/zapatillasmujer/Zapatillasnikedefy.png') }}">
<h3>Zapatilla Nike defy</h3>
<p class="precio">$125.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>










</div>

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

function filtrar(marca){

let productos = document.querySelectorAll(".producto");

productos.forEach(producto => {

if(marca === "todos"){
producto.style.display = "block";
}
else if(producto.dataset.marca === marca){
producto.style.display = "block";
}
else{
producto.style.display = "none";
}

});

}

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>