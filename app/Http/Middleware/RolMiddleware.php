<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, string $rol): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (strtolower(Auth::user()->rol) !== strtolower($rol)) {
            return redirect('/');
        }

        return $next($request);
    }
}