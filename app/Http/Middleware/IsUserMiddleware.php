<?php

namespace App\Http\Middleware;

use Closure;

class IsUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario = \Auth::user();

        if($usuario->rol == 'cliente') {
            return $next($request);
        } else {
            return redirect('/buscar_plantas');
        }
    }
}
