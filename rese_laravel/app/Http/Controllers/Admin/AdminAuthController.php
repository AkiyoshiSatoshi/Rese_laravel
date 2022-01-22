<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminAuthController extends Controller
{
    //Login
    public function adminLogin(LoginRequest $request)
    {
        try {
            $admin = User::where('email', $request->email)->first();
            // dd($admin);
            $auth_code = $admin->access_auth;
            $credentials = $request->only('email','password');
            if ( $auth_code == "1" && Auth::attempt($credentials)) {
                return redirect('/shop');
            }
        } catch (\Throwable $th) {
            return redirect('/admin/login');
        }
    }
    
    public function viewLogin()
    {
        return view('admin.login');
    }
}
