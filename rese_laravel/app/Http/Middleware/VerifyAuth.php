<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class VerifyAuth
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
        $test = User::where('email', $request->email)->first();
        $code = $test->access_code;
        if ($code == 1) {
            
        } else if ($code == 0) {
            
        }
    }
}
