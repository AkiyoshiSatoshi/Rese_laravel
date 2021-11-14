<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Adminshow()
    {
        return view('show');
    }
    public function adminedit()
    {
        $test = Auth::user()->access_auth;
        // return $test;
        if ($test == 9) {
            return view('auth.login');
        } else {
            return view('shop');
        }
    }
}
