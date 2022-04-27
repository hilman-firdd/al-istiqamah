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
        if (auth()->check() && Auth::user()->level == '1' )
        {
            $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
             if (strpos($url, "/login") == true){
                   return Redirect('/admin/dashboard');
                }else{
                    return Redirect('/admin/dashboard');
                }
        }
        
        if (Auth::guard($guard)->check()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
