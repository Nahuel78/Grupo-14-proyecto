<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Accesorios - Modape Sport</title>

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

<h2 class="titulo-productos">⭐⭐Accesorios⭐⭐</h2>

<div class="filtros">

<button onclick="filtrar('todos')">Todos</button>
<button onclick="filtrar('nike')">Nike</button>
<button onclick="filtrar('adidas')">Adidas</button>
<button onclick="filtrar('puma')">Puma</button>
<button onclick="filtrar('kappa')">Kappa</button>

</div>


<!-- PRODUCTOS -->

<div class="contenedor-productos">

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/Paleta Adipower.png') }}">
<h3>Paleta Adipower</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>


<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/gorra audi adidas.png') }}">
<h3>Gorra audi adidas</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="kappa">
<img src="{{ asset('img/accesorios/Paleta kappa.png') }}">
<h3>Paleta Kappa</h3>
<p class="precio">$50.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/accesorios/Paleta puma morada.png') }}">
<h3>Paleta Puma morada</h3>
<p class="precio">$58.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/accesorios/Paleta Puma.png') }}">
<h3>Paleta Puma</h3>
<p class="precio">$56.500</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/accesorios/pelota puma premier.png') }}">
<h3>Pelota Puma Futbol</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/piluso argentina.png') }}">
<h3>Piluso argentina</h3>
<p class="precio">$35.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/Mochila adidas2 .png') }}">
<h3>Mochila adidas t2</h3>
<p class="precio">$65.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/accesorios/Guantes puma arquero.png') }}">
<h3>Guantes Puma Arquero</h3>
<p class="precio">$69.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/pelota trionda.png') }}">
<h3>Pelota Trionda</h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/pelota adidas UCL.png') }}">
<h3>Pelota UCL 25/26</h3>
<p class="precio">$75.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/pelota adidas argentum.png') }}">
<h3>Pelota adidas argentum</h3>
<p class="precio">$55.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/pelota basquet nike t.png') }}">
<h3>Pelota Basquet Nike</h3>
<p class="precio">$52.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/bincha nike gris.png') }}">
<h3>Vincha nike gris</h3>
<p class="precio">$32.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>






<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/bolso nike.png') }}">
<h3>Bolso nike</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/gorra adidas mujer.png') }}">
<h3>Gorra adidas mujer</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/Mochila adidas mujer.png') }}">
<h3>Mochila adidas</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/piluso adidas.png') }}">
<h3>piluso adidas mujer</h3>
<p class="precio">$30.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/mochila nike mujer.png') }}">
<h3>Mochila nike</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/medias nike mujer.png') }}">
<h3>Medias nike</h3>
<p class="precio">$15.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/medias blancas adidas.png') }}">
<h3>Medias adidas</h3>
<p class="precio">$15.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/accesorios/mochilapuma.png') }}">
<h3>Mochila Puma</h3>
<p class="precio">$55.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/accesorios/canilleraspuma.png') }}">
<h3>Canillera Puma</h3>
<p class="precio">$25.000</p>
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