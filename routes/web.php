<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/hombre', function () {
    return view('hombre.index');
});

Route::get('/hombre/zapatillas', function () {
    return view('hombre.zapatillas');
});

Route::get('/hombre/ropa', function () {
    return view('hombre.ropa');
});

Route::get('/hombre/botines', function () {
    return view('hombre.botines');
});