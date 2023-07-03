<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BrandRouteOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::hasUser() && Auth::user()->role != "brand") {
            return redirect()->route('dashboard')->with('error_toast','Opps, you are not allowed to view intended Page!');
         }
        return $next($request);
    }
}
