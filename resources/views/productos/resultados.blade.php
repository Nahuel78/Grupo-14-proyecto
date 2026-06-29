@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')

<a href="{{ url('/inicio') }}" class="btn btn-outline-dark mb-3 position-relative z-3">
    ⬅ Volver al inicio
</a>

<h2 class="titulo-productos">
    🔍 Resultados para: "{{ $query }}"
</h2>

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

@empty

    <div style="text-align:center;width:100%;padding:50px;">
        <h3>No se encontraron productos.</h3>
    </div>

@endforelse

</div>
@endsection