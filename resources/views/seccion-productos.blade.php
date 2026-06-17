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

            <p class="stock">
                Stock disponible: {{ $producto->stock }}
            </p>

            @if($producto->stock > 0)

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

            @else

                <button disabled class="btn-sin-stock">
                    Sin stock
                </button>

            @endif

        </div>

    @endforeach

@else

    <p style="text-align:center; width:100%;">
        No hay productos destacados.
    </p>

@endif

</div>

