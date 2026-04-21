<h2 class="titulo-carrusel">🔥 Novedades de la temporada 🔥</h2>

<div id="carrusel" class="carousel slide" data-bs-ride="carousel">

    <!-- Puntitos -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carrusel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carrusel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carrusel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#carrusel" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#carrusel" data-bs-slide-to="4"></button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="{{ asset('img/carruselimagenes/conjuntoSeleccion.png') }}" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/carruselimagenes/camisetaArg2026.png') }}" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/carruselimagenes/camisetas-boca.png') }}" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/carruselimagenes/camisetariversuplente.png') }}" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/carruselimagenes/camisetaolimpicsdelions.png') }}" class="d-block w-100">
        </div>

         <div class="carousel-item">
            <img src="{{ asset('img/carruselimagenes/goaalkeepers.png') }}" class="d-block w-100">
        </div>


    </div>

    <!-- Flecha izquierda -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carrusel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <!-- Flecha derecha -->
    <button class="carousel-control-next" type="button" data-bs-target="#carrusel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>