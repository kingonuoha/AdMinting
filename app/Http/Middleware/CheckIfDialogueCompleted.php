<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfDialogueCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !auth()->user()->dialogue_complete) {
            // dd(auth()->user()->hasRole('brand'));
            // Check the user's role and redirect accordingly
            if (auth()->user()->hasRole('creator')) {
                return to_route('creators.dialogue');
            }

            if (auth()->user()->hasRole('brand')) {
                return to_route('brand.dialogue');
            }
        }

        return $next($request);
    }
}
