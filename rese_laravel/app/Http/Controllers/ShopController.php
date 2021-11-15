<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $tests = Shop::all();
        $item = Shop::with('genres')->get();
        if (Auth::check()) {
            return view('shop.index', compact('tests'));
        } else {
            return view('auth/login');
        }
    }
    public function shopdetail($id)
    {
        $tests = Shop::where('id', $id)->get();
        return view('shop.detail',compact('tests'));
    }
}
