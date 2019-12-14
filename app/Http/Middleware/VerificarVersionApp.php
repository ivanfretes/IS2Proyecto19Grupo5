<?php

namespace App\Http\Middleware;

use Closure;

class VerificarVersionApp
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
        if (isset($request->appCompilation) && $request->appCompilation < 10){
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
