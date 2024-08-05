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
<<<<<<< HEAD:app/Http/Middleware/RedirectIfAuthenticated.php
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
=======
        if ($role == "admin" && auth()->user()->isAdmin !== 1 ) {
           return redirect()->back();
        }
        if ($role == "users" && auth()->user()->isAdmin !== 0 ) {
            return redirect()->back();
>>>>>>> 58891ab (file has been updated):app/Http/Middleware/CheckRole.php
        }

        return $next($request);
    }
}
