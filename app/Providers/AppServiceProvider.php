<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    View::composer('*', function ($view) {

        $cantidadCarrito = 0;

        if (Auth::check()) {

            $carrito = VentaCabecera::where('user_id', Auth::id())
                ->where('estado', 'carrito')
                ->first();

            if ($carrito) {
                $cantidadCarrito = VentaDetalle::where('venta_id', $carrito->id)
                    ->sum('cantidad');
            }
        }

        $view->with('cantidadCarrito', $cantidadCarrito);
    });
}
}
