<?php

namespace App\Http\Middleware;

use Closure;

class SetDB
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
        if (set_database()) {
          return $next($request);
        }

        abort(404);
    }
}
