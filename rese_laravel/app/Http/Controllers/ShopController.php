<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Reservation;

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
    public function postshop(Request $request)
    {
        $image_path = $request->file('img_url')->store('public/test');

        $shop = new Shop;
        $param = [
            "name" => $request->shop_name,
            "img_url" => $image_path,
            "description" => $request->description,
            "area_id" => $request->area,
            "genre_id" => $request->genre,
            "owner_id" => Auth::id()
        ];
        $shop->fill($param)->save();
        
        $test = Shop::all();
        
        $adminRepre = Auth::user()->access_auth;
        if ( $adminRepre == 1 ) {
            echo "authentication success";
            dd($shop);
        } else {
            return "Not access";
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

    public function viewReps()
    {

        $test = Shop::where('owner_id', Auth::id())->first();
        // dd($test);
        if ($test) {
            $reservation = Reservation::where('shop_id', $test->id)->get();
            return view('admin.repre',compact('test', 'reservation'));
        } else {
            return view('admin.repre');
        }
    }
    public function shopdetail($id)
    {
        $shops = Shop::where('id', $id)->get();
        return view('shop.detail',compact('shops'));
    }
}
