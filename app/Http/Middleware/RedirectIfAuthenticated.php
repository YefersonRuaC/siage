<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if($request->user()->rol == 1){

                    return redirect(RouteServiceProvider::APRENDIZ);

                } elseif($request->user()->rol == 3){

                    return redirect(RouteServiceProvider::INSTRUCTOR);

                } elseif($request->user()->rol == 3){

                    return redirect(RouteServiceProvider::HOME);

                } elseif($request->user()->rol == 4){

                    return redirect(RouteServiceProvider::APOYO);

                } elseif($request->user()->rol == 5){

                    return redirect(RouteServiceProvider::PRACTICA);

                }
            }
        }

        return $next($request);
    }
}
