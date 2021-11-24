<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Like;
use App\Models\Shop;
use App\Models\Test;

class AdminController extends Controller
{
    public function Adminshow()
    {
        return view('show');
    }
    public function adminedit()
    {
        $test = Auth::user()->access_auth;
        if ($test == 9) {
            return view('auth.login');
        } else {
            return view('shop');
        }
    }

    public function mypage()
    {
        $shops = Shop::all();
        $likes=[];
        foreach($shops as $shop)
        {
            $like=Like::where('user_id',Auth::user()->id)->where('shop_id',$shop['id'])->first();
            array_push($likes,$like);
        }
        $reservations = Reservation::where('user_id', Auth::user()->id)->get();
        return view('mypage', compact('likes', 'reservations',));
    }

    public function adminindex()
    {
        return view('admin.index');
    }
}
