<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUser
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
        //authentikasi , jangan lupa setting file kernel di folder http $routeMiddleware
        // if (!auth()->check() || auth()->user()->username !== 'qbotsista') {
        //     abort(403);
        // }

        if (!auth()->check() || !auth()->user()->akses_level) {
            abort(403);
        }
        return $next($request);
    }
}
