<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Botines Hombre - Modape Sport</title>

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

    <div class="frase-header">
        <h2>Tu estilo, tu gusto, lo encontras en la mejor tienda</h2>
    </div>


    <div class="top-icons" style="display: flex; align-items: center; gap: 12px;">

    @auth

        <div style="text-align: right; line-height: 1.2; max-width: 130px; color: white; font-size: 14px; margin-right: 4px;">
            <span>Hola,</span><br>
            <strong>{{ auth()->user()->name }}</strong>
        </div>

        <div class="dropdown menu-usuario">

           @if(auth()->check() && strtolower(auth()->user()->rol) === 'admin')

                <a href="#" class="icono user dropdown-toggle"
                   data-bs-toggle="dropdown">
                    <i class="bi bi-shield-lock-fill"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('admin.panel') }}">
                            Panel Admin
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                           href="{{ route('admin.perfil') }}">
                            Mi Perfil
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>

            @else

                <a href="#" class="icono user dropdown-toggle"
                   data-bs-toggle="dropdown">
                    <i class="bi bi-person-check-fill"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                         href="{{ route('cliente') }}">
                         Panel Cliente
                         </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                           href="{{ route('cliente.perfil') }}">
                            Mi Perfil
                        </a>
                    </li>

                         <li>
                        <a class="dropdown-item"
                        href="{{ route('cliente.pedidos') }}">
                        Mis Pedidos
                    </a>
                </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                Cerrar Sesión
                            </button>
                        </form>
                    </li>

                </ul>

            @endif

        </div>

    @else

        <a href="{{ route('login') }}"
           class="icono user"
           title="Iniciar Sesión">
            <i class="bi bi-person"></i>
        </a>

    @endauth

     @auth

     @if(strtolower(auth()->user()->rol) !== 'admin')
        <a href="{{ route('cliente.carrito') }}" class="icono cart">
            <i class="bi bi-bag"></i>
            <span class="cart-count">{{ $cantidadCarrito }}</span>
        </a>
    @endif

@else

    <a href="{{ route('cliente.carrito') }}" class="icono cart">
        <i class="bi bi-bag"></i>
        <span class="cart-count">{{ $cantidadCarrito }}</span>
    </a>

@endauth

</div>

</header>

<nav>

<div class="menu">
    <button class="menu-toggle">
    ☰ Menú
    </button>

<a href="/inicio">Inicio</a>
<a href="/hombre/ropa">Ropa</a>
<a href="/hombre/zapatillas">Zapatillas</a>
<a href="/hombre/botines">Botines</a>

<form action="{{ route('buscar') }}" method="GET" class="barra-busqueda">
             <input type="text" name="q" placeholder="Buscar productos...">
            <button type="submit">🔍</button>
        </form>

</div>

</nav>

<h2 class="titulo-productos">⭐⭐ Botines ⭐⭐</h2>

<!-- FILTROS -->

<div class="filtros">

<button onclick="filtrar('todos')">Todos</button>
<button onclick="filtrar('nike')">Nike</button>
<button onclick="filtrar('adidas')">Adidas</button>
<button onclick="filtrar('puma')">Puma</button>
<button onclick="filtrar('newbalance')">New Balance</button>
<button onclick="filtrar('kappa')">Kappa</button>

</div>


<div class="contenedor-productos">

{{-- Productos de la base de datos --}}
@foreach($productos as $producto)

    <div class="producto"
         data-marca="{{ strtolower($producto->marca) }}">

        @if($producto->url_imagen)
            <img src="{{ asset($producto->url_imagen) }}"
                 alt="{{ $producto->nombre }}">
        @endif

        <h3>{{ $producto->nombre }}</h3>

        <p class="precio">
            ${{ number_format($producto->precio, 0, ',', '.') }}
        </p>
         <p class="stock">
   
         Stock disponible: {{ $producto->stock }}
           </p>

           <form action="{{ route('carrito.agregar') }}"
      method="POST"
      class="form-agregar-carrito">
    @csrf

    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
    <input type="hidden" name="cantidad" value="1">

    <button type="submit" class="btn-carrito">
        Agregar al carrito
    </button>
</form>

    </div>

@endforeach




</div>

@include('footer')

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
<script>
document.querySelectorAll('.form-agregar-carrito').forEach(form => {

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        fetch(this.action, {
            method: 'POST',
            body: new FormData(this),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {

            let carrito = document.querySelector('.cart-count');

            if (carrito) {
                carrito.textContent =
                    parseInt(carrito.textContent) + 1;
            }

            // MOSTRAR MENSAJE
            const toast = document.getElementById('toast-carrito');

            toast.classList.add('mostrar');

            setTimeout(() => {
                toast.classList.remove('mostrar');
            }, 2000);

        })
        .catch(error => {
            console.error(error);
        });

    });

});
</script>

<div id="toast-carrito" class="toast-carrito">
    ✅ Producto agregado al carrito
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>