<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class fans
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
            return redirect('/');
        }
        if(Auth::user()->role != 2) {
            return redirect('/');
        }
        return $next($request);
    }
}
