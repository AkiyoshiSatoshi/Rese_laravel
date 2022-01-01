<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyAuthenticated
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
        if (auth()->check()) {
            return redirect('/shop');
        }
        return $next($request);
    }
}
//ログイン済みのアカウントが再度Login画面に移動しようとした時に表示される場合のmiddleware