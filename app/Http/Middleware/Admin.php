<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Admin {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (Auth::check() && 
            Auth::user()->isAdmin() && 
            Auth::user()->isActive()) {
            
            return $next($request);
        }

        return abort(401);
    }
}
