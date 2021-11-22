<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Like;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        if (empty(Auth::id())) {
            return view('shop.index',compact('shops'));
        }

        $id = Auth::user()->id;
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
        if (Auth::check()) {
            return view('shop.index', compact('shops', 'likes'));
        } else {
            return view('auth/login');
        }
    }
    public function postshop()
    {
        $shop = new Shop;
        $adminRepre = Auth::user()->access_auth;
        if ( $adminRepre == 1 ) {
            echo "authentication success";
            dd($shop);
        } else {
            return "Not access";
            // return view('/');
        }
    }

    public function viewReps()
    {
        return view('admin.repre');
    }
    public function shopdetail($id)
    {
        $shops = Shop::where('id', $id)->get();
        return view('shop.detail',compact('shops'));
    }
}
