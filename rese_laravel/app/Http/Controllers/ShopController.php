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
    public function index()
    {
        $shops = Shop::all();
        //ユーザー未登録遷移
        try {
            $admin = Auth::user()->access_auth;
            $id = Auth::user()->id;
            if ($admin == 0 ) {
                // $id = Auth::user()->id;
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
                    return view('admin.repre',compact('owner', 'reservation','user'));
                } else {
                    return view('admin.repre',compact('user'));
                }
            } else {
                return view('admin.index');
            }
        } catch (\Throwable $th) {
            echo "Not User registration";
            return view('shop.index',compact('shops'));
        }
    }

    public function updateshop(Request $request)
    {
        $shop = Shop::where('owner_id', $request->owner_id)->first();
        $form = $request->all();
        unset($form['_token']);
        $shop->fill($form)->save();
        dd($shop);
    }

    public function shopdetail($id)
    {
        $shops = Shop::where('id', $id)->get();
        return view('shop.detail',compact('shops'));
    }
    
}
