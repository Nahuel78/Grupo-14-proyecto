<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Niños - Modape Sport</title>

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
<a href="/niños/ropa">Ropa</a>
<a href="/niños/zapatillas">Zapatillas</a>
<a href="/niños/botines">Botines</a>

<form class="barra-busqueda">
<input type="text" placeholder="Buscar productos...">
<button type="submit">🔍</button>
</form>

</div>

</nav>

<h2 class="titulo-productos">⭐⭐ Niños / Niñas⭐⭐</h2>

<!-- FILTROS -->

<div class="filtros">

<button onclick="filtrar('todos')">Todos</button>
<button onclick="filtrar('niño')">Niño</button>
<button onclick="filtrar('niña')">Niña</button>
<button onclick="filtrar('nike')">Nike</button>
<button onclick="filtrar('adidas')">Adidas</button>
<button onclick="filtrar('puma')">Puma</button>
<button onclick="filtrar('kappa')">Kappa</button>

</div>

<div class="contenedor-productos">

<div class="producto" data-marca="adidas" data-genero="niño">
<img src="{{ asset('img/ninos/conjuntoseleccionniño.png') }}">
<h3> Conjunto Adidas Niño</h3>
<p class="precio">$120.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/conjuntoadidax2.png') }}">
<h3> Conjunto Adidas Niño/Niña</h3>
<p class="precio">$120.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/conjuntoseleccionniño.png') }}">
<h3> Conjunto Adidas Seleccion Niño/Niña</h3>
<p class="precio">$120.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/camisetadebocaniño.png') }}">
<h3> Camiseta Adidas Boca Niño/Niña</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma" data-genero="unisex">
<img src="{{ asset('img/ninos/camisetaindependienteniño.png') }}">
<h3> Camiseta Puma Independiente Niño/Niña</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/camisetariverniño.png') }}">
<h3> Camiseta Adidas River Niño/Niña</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="niño">
<img src="{{ asset('img/ninos/pantalonjoggeradidasniño.png') }}">
<h3>Pantalon jogger Adidas Niño</h3>
<p class="precio">$130.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/pantalonriverniño.png') }}">
<h3>Pantalon Adidas River Niño</h3>
<p class="precio">$90.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/buzoargentinaniño.png') }}">
<h3>Buzo Adidas Seleccion Niño</h3>
<p class="precio">$100.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="niña">
<img src="{{ asset('img/ninos/remeraadidasdisneyniña.png') }}">
<h3>Remera Adidas Disney Niña</h3>
<p class="precio">$40.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>


<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/zapaadidasniño.png') }}">
<h3> Zapatilla Adidas Niño/Niña</h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="niña">
<img src="{{ asset('img/ninos/zapaadidasniñablanca.png') }}">
<h3> Zapatilla Adidas niña</h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="niño">
<img src="{{ asset('img/ninos/zapadeportivaadidasniño.png') }}">
<h3> Zapatilla Adidas niño</h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="niño">
<img src="{{ asset('img/ninos/zapaadidasniño2.png') }}">
<h3> Zapatilla Adidas niño</h3>
<p class="precio">$90.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="kappa" data-genero="niña">
<img src="{{ asset('img/ninos/zapakappaniña.png') }}">
<h3> Zapatilla Kappa niña Pink</h3>
<p class="precio">$40.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="kappa" data-genero="niña">
<img src="{{ asset('img/ninos/zapakappaniña2.png') }}">
<h3> Zapatilla Kappa niña</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="kappa" data-genero="niño">
<img src="{{ asset('img/ninos/zapakappa3niño.png') }}">
<h3> Zapatilla Kappa niño</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>



<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/botinadidasniño.png') }}">
<h3> Botin Adidas niño/Niña</h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="adidas" data-genero="unisex">
<img src="{{ asset('img/ninos/botinadidasniño2.png') }}">
<h3> Botin Adidas niño/Niña</h3>
<p class="precio">$80.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="kappa" data-genero="unisex">
<img src="{{ asset('img/ninos/botineskappaniño.png') }}">
<h3> Botin Kappa niño/Niña</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="puma" data-genero="unisex">
<img src="{{ asset('img/ninos/botinniñoyniña.png') }}">
<h3> Botin Puma niño/Niña</h3>
<p class="precio">$60.000</p>
<button class="btn-carrito agregar-carrito">Agregar al carrito</button>
</div>

<div class="producto" data-marca="kappa" data-genero="unisex">
<img src="{{ asset('img/ninos/botinkappadepastoniño.png') }}">
<h3> Botin Kappa niño/Niña</h3>
<p class="precio">$60.000</p>
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

function filtrar(filtro){

let productos = document.querySelectorAll(".producto");

productos.forEach(producto => {

let marca = producto.dataset.marca;
let genero = producto.dataset.genero;

if(filtro === "todos"){
producto.style.display = "";
}

else if(filtro === marca || filtro === genero){
producto.style.display = "";
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