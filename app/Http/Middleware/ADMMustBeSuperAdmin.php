<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ADMMustBeSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role != 'adm_admin'){
            return redirect()->to('/dashboard')->with('error_toast','UNAUTHORISED!, you are not permitted to view intended Page!');
        }
        return $next($request);
    }
}
