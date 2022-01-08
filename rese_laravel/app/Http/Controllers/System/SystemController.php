<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SystemController extends Controller
{
    public function adminStore(Request $request)
    {
        $auth_code = 1;
        $system = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verify_token' => base64_encode($request->email),
            'access_auth' => $auth_code,
        ]);
        return redirect('/shop');
    }
}
