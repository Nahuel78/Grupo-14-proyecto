<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hombre - Modape Sport</title>

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

<a href="/inicio">Inicio</a>
<a href="/hombre/ropa">Ropa</a>
<a href="/hombre/zapatillas">Zapatillas</a>
<a href="/hombre/botines">Botines</a>

<form class="barra-busqueda">
<input type="text" placeholder="Buscar productos...">
<button type="submit">🔍</button>
</form>

</div>

</nav>

<h2 class="titulo-productos">⭐⭐ Hombre ⭐⭐</h2>

<!-- FILTROS -->

<div class="filtros">

<button onclick="filtrar('todos')">Todos</button>
<button onclick="filtrar('nike')">Nike</button>
<button onclick="filtrar('adidas')">Adidas</button>
<button onclick="filtrar('puma')">Puma</button>
<button onclick="filtrar('kappa')">Kappa</button>
<button onclick="filtrar('newbalance')">New Balance</button>

</div>

<div class="contenedor-productos">


<div class="producto" data-marca="nike">
<img src="{{ asset('img/ropa/camperanike.png') }}">
<h3> Campera Nike</h3>
<p class="precio">$120.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/carruselimagenes/camisetaArg2026.png') }}">
<h3>Camiseta Argentina</h3>
<p class="precio">$95.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/carruselimagenes/conjuntoSeleccion.png') }}">
<h3>Conjunto Selección</h3>
<p class="precio">$140.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropa/conjunto-seleccion-invierno.png') }}">
<h3>Conjunto Selección</h3>
<p class="precio">$200.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropa/campera-boca.png') }}">
<h3>Campera Boca</h3>
<p class="precio">$150.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropa/buzo-river.png') }}">
<h3>Buzo river</h3>
<p class="precio">$150.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropa/camisetabocatitular1.png') }}">
<h3>Camiseta Boca</h3>
<p class="precio">$130.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropa/camisetarivertitular.png') }}">
<h3>Camiseta River</h3>
<p class="precio">$130.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/ropa/joginnike.png') }}">
<h3>Pantalon joggin Nike retro</h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropa/buzoadidasuplente.png') }}">
<h3> Conjunto Seleccion</h3>
<p class="precio">$180.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/ropa/buzocangurowhite.png') }}">
<h3> Buzo canguro Nike</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/ropa/buzoadidasliverpol.png') }}">
<h3> Buzo Adidas Liverpool</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('img/ropa/pantalonmachestercity.png') }}">
<h3> Pantalon Deportivo Manchester City</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>



<div class="producto" data-marca="adidas">
<img src="{{ asset('/img/zapatillas/zapaadidas.png') }}">
<h3> Zapatillas Adidas Urbanas</h3>
<p class="precio">$150.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma">
<img src="{{ asset('/img/zapatillas/zapapuma.png') }}">
<h3> Zapatillas Puma Urbanas</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('/img/zapatillas/zapanikenegra.png') }}">
<h3> Zapatillas Nike Air Max black</h3>
<p class="precio">$200.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('/img/zapatillas/zapasnikeairmaxnegra.png') }}">
<h3> Zapatillas Nike air Max black and Orange</h3>
<p class="precio">$200.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('/img/zapatillas/zapasnikeairmax.png') }}">
<h3> Zapatillas Nike Air Max White and Orange </h3>
<p class="precio">$150.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('/img/zapatillas/zpatillaadidasrunning.png') }}">
<h3> Zapatillas Adidas Runnig </h3>
<p class="precio">$200.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/zapatillas/zapanike.png') }}">
<h3>Zapatillas Nike Jordan Retro 1</h3>
<p class="precio">$110.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/zapatillas/zapasnikeJordanretro1.png') }}">
<h3>Zapatillas Nike Jordan Retro 1</h3>
<p class="precio">$110.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/zapatillas/zapatillasnike1.png') }}">
<h3>Zapatillas Nike Urbanas</h3>
<p class="precio">$90.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>



<div class="producto" data-marca="puma">
<img src="{{ asset('img/botines/-PUMA-BLACK-POISON-PINK_1.png') }}">
<h3>Botin Puma Black and Pink</h3>
<p class="precio">$90.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="kappa">
<img src="{{ asset('img/botines/botinkappa.png') }}">
<h3>Botin Kappa black</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="newbalance">
<img src="{{ asset('img/botines/botinnewbalance.png') }}">
<h3>Botin New Balance</h3>
<p class="precio">$70.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="newbalance">
<img src="{{ asset('img/botines/botinnewbalance1.png') }}">
<h3>Botin New Balance</h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="kappa">
<img src="{{ asset('img/botines/botinkappa2.png') }}">
<h3>Botin Kappa</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/botines/botinnikeamarillo.png') }}">
<h3>Botin Nike Superfly Amarillo fluor</h3>
<p class="precio">$150.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas">
<img src="{{ asset('img/botines/botinesadidaspredator.png') }}">
<h3>Botin Adidas Predator</h3>
<p class="precio">$200.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="newbalance">
<img src="{{ asset('img/botines/newbalance2.png') }}">
<h3>Botin New Balance f5</h3>
<p class="precio">$70.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="nike">
<img src="{{ asset('img/botines/nikenegrobotin.png') }}">
<h3>Botin Nike Black</h3>
<p class="precio">$150.000</p>
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