<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SchoolMiddleware
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
        // Check if the user is logged in or not?
        if (Auth::check()) {
            // Check if the user is school user
            if (Auth::user()->role == 2) {
                return $next($request);
            }
        }

        // Otherwise redirect to login page
        return redirect()->route('school.login');
    }
}
