<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;


use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

class RegisterController extends Controller
{
    public function userStore()
    {
        return view('auth.pre_register');
    }

    public function preStore(Request $request)
    {
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
            return view('auth.mail_confirm');
        } else {
            return view('auth.pre_register');
        }
    }

    public function view($token)
    {
        $user = User::where('email_verify_token', $token)->first();
        return view('auth.main_register', compact('user'));
    }

    public function create(Request $request)
    {
        $user = User::where('email_verify_token', $request->email_token)->first();
        $user->name = $request->name;
        $user->save();
        return view('auth.main_registered');
    }
}