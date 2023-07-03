<?php

namespace App\Http\Middleware;

use App\Models\appVisits;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use Symfony\Component\HttpFoundation\Response;

class appVisitTrackMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip_address = $request->ip();
        $device = Agent::device();
        $browser = Agent::browser();
        $hits = 1;
        $os = Agent::platform();
        $currentDate = Carbon::today();
        $alreadyExistingTrackVisit = appVisits::where(['ip_address'=> $ip_address, 'browser' => $browser, 'os'=>$os])
                                    ->whereDate('updated_at', $currentDate)
                                    ->first();
                                    // dd($alreadyExistingTrackVisit);
        if( $alreadyExistingTrackVisit != null){
            $alreadyExistingTrackVisit->hits++;
            $alreadyExistingTrackVisit->save();
        }else{
            $appvisit = new appVisits();
            $appvisit->ip_address = $ip_address;
            $appvisit->device = $device;
            $appvisit->browser = $browser;
            $appvisit->hits = $hits;
            $appvisit->os = $os;
            $appvisit->save();
        }
        return $next($request);
    }
}
