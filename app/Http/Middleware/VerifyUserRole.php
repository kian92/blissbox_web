<?php

namespace App\Http\Middleware;

use app\Helpers\DDD;
use Auth;
use Closure;

class VerifyUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if ($request->user()->role->initial === $type) {
            return $next($request);
        }

        abort(403);
    }
}
