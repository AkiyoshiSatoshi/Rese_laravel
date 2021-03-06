<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

class AuthController extends Controller
{
    //Pre-Register
    public function viewStore()
    {
        return view('user.pre_register');
    }

    //仮登録
    public function preStore(Request $request)
    {
        dd($request->all());
        $auth_code = 0;
        $password = $request->password;
        $password_checked = $request->password_confirmation;
        if ($password == $password_checked) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verify_token' => base64_encode($request->email),
                'access_auth' => $auth_code,
            ]);
            Mail::to($request->email)->send(new EmailVerification($user));
            return view('user.mail_confirm');
        } else {
            return view('user.pre_register');
        }
    }
    
    //Login
    public function userLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        // if () {
        //     # code...
        // }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return redirect('/login');
    }
    //toLogin
    public function viewLogin()
    {
        return view('user.login');
    }
}
