<?php

namespace App\Http\Middleware;
use auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ($role == "admin" && auth()->user()->isAdmin !== 1 ) {
           return redirect()->back();
        }
        if ($role == "users" && auth()->user()->isAdmin !== 0 ) {
            return redirect()->back();
        }
        return $next($request);
    }
}
