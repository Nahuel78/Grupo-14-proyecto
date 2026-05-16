<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mujer - Modape Sport</title>

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

<h2 class="titulo-productos">⭐⭐ Mujer ⭐⭐</h2>

<div class="filtros">

<button onclick="filtrar('todos')">Todos</button>
<button onclick="filtrar('nike')">Nike</button>
<button onclick="filtrar('adidas')">Adidas</button>
<button onclick="filtrar('puma')">Puma</button>

</div>


<!-- PRODUCTOS -->

<div class="contenedor-productos">

<div class="producto" data-marca="nike">
<img src="{{ asset('img/ropamujer/Calza nike.png') }}">
<h3>Calza Nike Mujer</h3>
<p class="precio">$50.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/Topadidas.png') }}">
<h3>Top Adidas Deportivo</h3>
<p class="precio">$45.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/ropamujer/conjuntopumamujer.png') }}">
<h3>Conjunto Puma</h3>
<p class="precio">$90.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

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
<img src="{{ asset('img/ropamujer/buzo adidas deportivo.png') }}">
<h3>Buzo adidas deportivo </h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/camiseta de boca.png') }}">
<h3>Camiseta de boca alternativa</h3>
<p class="precio">$70.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/conjunto adidas deportivo rosa.png') }}">
<h3>Conjunto adidas rosa </h3>
<p class="precio">$65.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/conjunto boca f.png') }}">
<h3>Conjunto de boca </h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/conjunto River f.png') }}">
<h3>Conjunto de River </h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/Conjunto Seleccion argentina f.png') }}">
<h3>Conjunto Seleccion argentina</h3>
<p class="precio">$105.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/remera de river f.png') }}">
<h3>Remera de river alternativa</h3>
<p class="precio">$70.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/conjunto nike .png') }}">
<h3>Conjunto nike</h3>
<p class="precio">$110.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/camiseta titular seleccion.png') }}">
<h3>Camiseta de Argentina titular</h3>
<p class="precio">$85.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropamujer/Calza adidas.png') }}">
<h3>Calza adidas</h3>
<p class="precio">$50.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>


<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/gorra adidas mujer.png') }}">
<h3>Gorra adidas</h3>
<p class="precio">$35.000</p>
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
<h3>piluso adidas</h3>
<p class="precio">$30.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/mochila nike mujer.png') }}">
<h3>mochila nike</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/bolso nike.png') }}">
<h3>bolso nike</h3>
<p class="precio">$90.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/accesorios/medias nike mujer.png') }}">
<h3>medias nike</h3>
<p class="precio">$15.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/accesorios/medias blancas adidas.png') }}">
<h3>medias adidas</h3>
<p class="precio">$15.000</p>
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