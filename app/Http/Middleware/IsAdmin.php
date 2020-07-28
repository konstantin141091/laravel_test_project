<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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

        if (is_null(\Auth::user())) {
            return redirect()->route('index');
        }
        if (!\Auth::user()->is_admin) {
            return redirect()->route('index');
        }
        return $next($request);
    }
}
