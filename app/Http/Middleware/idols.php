<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class idols
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()) {
            return redirect()->route('idol-signin');
        }
        if(Auth::user()->role != 1) {
            return redirect('/');
        }
        return $next($request);
    }
}
