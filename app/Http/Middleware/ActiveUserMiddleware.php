<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( auth()->check() ) {
            if ( auth()->user()->suspend_user && now()->lessThan(auth()->user()->suspend_user)) {
                Auth::logout();
                return redirect()->route('login')->with('suspend', 'Your account has been suspended for a reason.');
            }
        }
        return $next($request);
    }
}
