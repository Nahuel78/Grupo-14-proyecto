@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')

<h2>Resultados para: "{{ $query }}"</h2>

<div class="contenedor-productos">

@foreach($productos as $producto)
    <div class="producto">

        <img src="{{ asset($producto->url_imagen) }}" alt="{{ $producto->nombre }}">

        <h3>{{ $producto->nombre }}</h3>
        <p>${{ $producto->precio }}</p>

    </div>
@endforeach
</div>

@endsection