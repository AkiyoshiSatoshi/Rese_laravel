<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        // return Auth::user();
        
        if (Auth::check()) {
            return view('shop');
        } else {
            return view('auth/login');
        }
    }
}
