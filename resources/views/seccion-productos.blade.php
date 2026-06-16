<h2 class="titulo-productos">⭐⭐ Productos Destacados ⭐⭐</h2>

<div class="contenedor-productos">

    @if(isset($productos) && $productos->count())

        @foreach($productos as $producto)

            <div class="producto">

                @if($producto->url_imagen)
                    <img src="{{ asset($producto->url_imagen) }}" alt="{{ $producto->nombre }}">
                @endif

                <h3>{{ $producto->nombre }}</h3>

                <p>${{ number_format($producto->precio,0,',','.') }}</p>

                <!-- BOTÓN CARRITO -->
                <button class="btn-carrito agregar-carrito">
                    Agregar al carrito
                </button>

            </div>

        @endforeach

    @else

        <p style="text-align:center; width:100%;">
            No hay productos destacados.
        </p>

    @endif

</div>