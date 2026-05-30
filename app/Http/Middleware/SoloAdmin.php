<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario está logueado y es Nahuel (o es admin), lo deja pasar
        if (Auth::check() && (Auth::user()->email === 'nahuelg947@gmail.com' || Auth::user()->rol === 'admin')) {
            return $next($request);
        }

        // Si no es admin, lo rebota a la página de inicio
        return redirect('/')->with('error', 'No tienes permisos de administrador.');
    }
}