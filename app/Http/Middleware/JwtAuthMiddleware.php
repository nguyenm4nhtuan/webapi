<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class JwtAuthMiddleware
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
        //Todo implement check jwt here
        preg_match('/Bearer\s(\S+)/', $request->header('Authorization'), $matches);

        if (!empty($matches) && $matches[1] === 'true') {
            return $next($request);
        }
        return response()->json('Unauthorized', Response::HTTP_UNAUTHORIZED);

    }
}
