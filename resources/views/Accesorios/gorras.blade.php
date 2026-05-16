<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gorras - Modape Sport</title>

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
<a href="/accesorios/mochila">Mochila</a>
<a href="/accesorios/medias">Medias</a>
<a href="/accesorios/pelotas">Pelotas</a>
<a href="/accesorios/gorras">Gorras</a>
<a href="/accesorios/paletas">Paletas</a>

<form class="barra-busqueda">
<input type="text" placeholder="Buscar productos...">
<button type="submit">🔍</button>
</form>

</div>

</nav>

<h2 class="titulo-productos">⭐⭐Gorras⭐⭐</h2>

<div class="filtros">

<button onclick="filtrar('todos')">Todos</button>
<button onclick="filtrar('nike')">Nike</button>
<button onclick="filtrar('adidas')">Adidas</button>
<button onclick="filtrar('puma')">Puma</button>


</div>


<!-- PRODUCTOS -->

<div class="contenedor-productos">



<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/gorra audi adidas.png') }}">
<h3>Gorra audi adidas</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>


<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/piluso argentina.png') }}">
<h3>Piluso argentina</h3>
<p class="precio">$35.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>


<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/bincha nike gris.png') }}">
<h3>Vincha nike gris</h3>
<p class="precio">$32.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>



<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/gorra adidas mujer.png') }}">
<h3>Gorra adidas mujer</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/gorrito nike.png') }}">
<h3>gorro nike peak</h3>
<p class="precio">$40.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/gorra nike blanca.png') }}">
<h3>gorra nike blanca</h3>
<p class="precio">$38.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/accesorios/gorra puma.png') }}">
<h3>gorra puma</h3>
<p class="precio">$34.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>


<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/piluso adidas.png') }}">
<h3>piluso adidas mujer</h3>
<p class="precio">$30.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>


<div class="producto" data-marca="puma">
<img src="{{ asset('img/accesorios/gorratenispuma.png') }}">
<h3>Gorra Tenis Puma</h3>
<p class="precio">$35.000</p>
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