<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //guard = our website, check() sees if your authenticated.
        if (Auth::guard($guard)->check() == false) {
            return redirect(route('login'));
            // dd (Auth::guard($guard)->check());
        }
        // next step
        return $next($request);
    }
}
