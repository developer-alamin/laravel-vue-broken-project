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
        if ($role == 'admin' && auth()->user()->role !== 'admin' ) {
           return redirect()->back();
        }
        if ($role == 'users' && auth()->user()->role !== 'users' ) {
            return redirect()->back();
        }
        return $next($request);
    }
}
