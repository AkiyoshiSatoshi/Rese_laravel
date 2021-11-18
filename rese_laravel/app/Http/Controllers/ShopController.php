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
        $tests = Shop::all();
        $id = Auth::user()->id;
        $search = Shop::doesnthave('likes')->get();
        $likes=array();
        $likes[0]='dummy';
        foreach($tests as $shop)
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
            return view('shop.index', compact('tests', 'likes'));
        } else {
            return view('auth/login');
        }
    }
    public function shopdetail($id)
    {
        $tests = Shop::where('id', $id)->get();
        return view('shop.detail',compact('tests'));
    }

    public function mypage(Request $request)
    {
        
    }
}
