<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SystemAuth
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

        // var_dump($request->email);
        if (!auth()->check()) {
            return $next($request);
        }
        abort(403, '管理者権限があります。');
    }
}
