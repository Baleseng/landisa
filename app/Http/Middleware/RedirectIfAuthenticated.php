<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        

        if ($guard == "admin"   && Auth::guard($guard)->check()) { return redirect('/admin'); }
        if ($guard == "editor"  && Auth::guard($guard)->check()) { return redirect('/editor'); }
        if ($guard == "writer"  && Auth::guard($guard)->check()) { return redirect('/writer'); }
        if ($guard == "moderator"  && Auth::guard($guard)->check()) { return redirect('/moderator'); }
        if ($guard == "adops" && Auth::guard($guard)->check()) { return redirect('/adops'); }

        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
        
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        return $next($request);
    }
}
