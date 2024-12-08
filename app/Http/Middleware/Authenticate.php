<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // Aquí verificas si el usuario está autenticado, de no estarlo lo rediriges al login
        if (Auth::guard('web')->guest()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
