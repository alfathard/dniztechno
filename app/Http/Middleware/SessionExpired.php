<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Auth;
use Session;

class SessionExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // protected $session;
    // protected $timeout = 60;
     
    public function __construct(Store $session){
        $this->session = $session;
    }
    public function handle($request, Closure $next)
    {
        // If user is not logged in...
        if (!Auth::check()) {
        return $next($request);
        }
    
        $user = Auth::guard()->user();
    
        $now = Carbon::now();
    
        $last_seen = Carbon::parse($user->last_seen_at);
    
        $absence = $now->diffInMinutes($last_seen);
    
        // If user has been inactivity longer than the allowed inactivity period
        if ($absence > config('session.lifetime')) {
        Auth::guard()->logout();
    
        $request->session()->invalidate();
    
        return $next($request);
        }
    
        $user->last_seen_at = $now->format('Y-m-d H:i:s');
        $user->save();
    
        return $next($request);
    }
}
