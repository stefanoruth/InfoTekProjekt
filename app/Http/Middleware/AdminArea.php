<?php

namespace App\Http\Middleware;

use Closure;

class AdminArea
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
        if (!auth()->check()) {
            throw new \Exception('Unauthenticated.');
        }

        if (!auth()->user()->isAdmin()) {
            throw new \Exception('Admin rights are need to access this area.');
        }

        return $next($request);
    }
}
