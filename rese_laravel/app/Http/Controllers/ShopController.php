<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Like;
use App\Models\User;
use App\Models\Reservation;

class ShopController extends Controller
{
    public function view()
    {
        return view('index');
    }
    public function index()
    {
        $shops = Shop::all();
        //ユーザー未登録遷移
        try {
            $admin = Auth::user()->access_auth;
            $id = Auth::user()->id;
            if ($admin == 0 ) {
                $likes=array();
                $likes[0]='dummy';
                foreach($shops as $shop)
                {
                    $like=Like::where('user_id',$id)->where('shop_id',$shop['id'])->first();
                    if(!empty($like)){
                        $like=1;
                    }else{
                        $like=0;
                    }
                    array_push($likes,$like);
                }
                return view('shop.index', compact('shops', 'likes'));
            } else if ( $admin == 1) {
                $user = User::find($id)->first();
                $owner = Shop::where('owner_id', $id)->first();
                if ($owner) {
                    $reservation = Reservation::where('shop_id', $owner->id)->get();
                    return view('admin.index',compact('owner', 'reservation','user'));
                } else {
                    return view('admin.index',compact('user'));
                }
            } else {
                return view('system.repre_register');
            }
        } catch (\Throwable $th) {
            // echo $th;
            echo "Not User registration";
            return view('shop.index',compact('shops'));
        }
    }

    public function shopdetail($id)
    {
        $shops = Shop::where('id', $id)->get();
        return view('shop.detail',compact('shops'));
    }
}
