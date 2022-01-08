<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SystemAuthController extends Controller
{
    public function viewLogin()
    {
        return view('system.login');
    }
    public function postLogin(Request $request)
    {
        try {
            $system = User::where('email', $request->email)->first();
            $auth_code = $system->access_auth;
            $credentials = $request->only('email', 'password');
            if ( $auth_code == "9" && Auth::attempt($credentials)) {
                return redirect('/shop');
            }
        } catch (\Throwable $th) {
            return redirect('system/login');
        }
    }
}
