<?php

namespace App\Http\Middleware;

use Closure;

class Supervisor
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
        if(auth()->check() && auth()->user()->role == 'supervisor')
        {
            return $next($request);
        }
        elseif(auth()->check() && auth()->user()->role == 'cashier')
        {
            return '/cashier';
        }
    }
}
