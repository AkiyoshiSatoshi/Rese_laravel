<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request, Closure $next)
    {
        dd($request->all());
        if ($request) {
            // return $next($request);
        }
        // $user = User::where('email', $request->email)->first();
        // $admin = Auth::user();
        // dd($admin);
        // if (! $request->expectsJson() || ! $user->auth_code == "0") {
        //     return route('eeee');
        // }
        // if ($user->auth_code == "0") {
        //     return $next($request);
        // } else if ($user->auth_code == "1") {
        //     return $next($request);
        // } else
        // if ($user->auth_code == "9") {
        //     return $next($request);
        // } else {
        //     return route('shop');
        // }
            return $next($request);
    }
}
