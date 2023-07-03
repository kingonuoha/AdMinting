<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CreatorsCheckIfDialogueCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        // check if the authenticated user has completed the dialogue and the user must be an advertiser
        if (Auth::hasUser() && !auth()->user()->dialogue_complete && auth()->user()->role == "creator") {

           return redirect()->route('creators.dialogue');
        }
        return $next($request);
    }
}
