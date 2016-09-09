<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //dd(Auth::user()->email);
        if (Auth::check()) {
            //dd(Auth::user());
//            $username=Auth::user()->email;
            return redirect('/userHome');
        }

        return $next($request);
    }
}
