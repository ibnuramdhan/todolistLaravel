<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Method', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Contorl-Allow-Headers', 'ContentType, Authorization, X-Requested-With, X-XSRF-TOKEN');
        ;
    }
}
