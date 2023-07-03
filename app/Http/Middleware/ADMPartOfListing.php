<?php

namespace App\Http\Middleware;

use App\Models\Listing;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ADMPartOfListing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $listing_slug = $request->route()->parameters['listing'];
        if($listing_slug){
            $listing = Listing::where('slug', $listing_slug)->first();
            if (auth()->user()->id !== $listing->user_id || auth()->user()->id !== $listing->onboarded_by || auth()->user()->role != 'adm_admin') {
                return redirect()->to('/dashboard')->with('error_toast','You ar not allowed to view, because you were not part of the project');
            }
            
        }else{
            return redirect()->to('/dashboard')->with('error_toast','Job Listing Does not Exist anymore!');
            
        }
        return $next($request);
        
    }
}
