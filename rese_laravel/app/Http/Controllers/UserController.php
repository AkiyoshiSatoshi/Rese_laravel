<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\Like;

class UserController extends Controller
{
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
}
