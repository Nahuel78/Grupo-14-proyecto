@extends('estilo')

@section('contenido')

@include('carrusel')

@include('seccion-productos')

@if(auth()->check())
    LOGUEADO: {{ auth()->user()->name }}
@else
    NO LOGUEADO
@endif

@endsection