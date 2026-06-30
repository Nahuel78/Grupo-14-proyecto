@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')

<a href="{{ url('/inicio') }}" class="btn btn-outline-dark mb-3 position-relative z-3">
    ⬅ Volver al inicio
</a>

<h2 class="titulo-productos">
    🔍 Resultados para: "{{ $query }}"
</h2>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="contenedor-productos">

@forelse($productos as $producto)

    <div class="producto">

    @if($producto->url_imagen)
        <img src="{{ asset($producto->url_imagen) }}"
             alt="{{ $producto->nombre }}">
    @endif

    <h3>{{ $producto->nombre }}</h3>

    <p class="precio">
        ${{ number_format($producto->precio,0,',','.') }}
    </p>
     <p class="stock {{ $producto->stock > 0 ? 'disponible' : 'agotado' }}">
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

        <button class="btn-sin-stock" disabled>
            Sin stock
        </button>

    @endif

</div>
@empty

    <div style="text-align:center;width:100%;padding:50px;">
        <h3>No se encontraron productos.</h3>
    </div>

@endforelse

</div>
<div id="toast-carrito" class="toast-carrito">
    ✅ Producto agregado al carrito
</div>
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

            const toast = document.getElementById('toast-carrito');

            if (toast) {
                toast.classList.add('mostrar');

                setTimeout(() => {
                    toast.classList.remove('mostrar');
                }, 2000);
            }

        })
        .catch(error => console.error(error));

    });

});

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection