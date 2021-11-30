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
        //ユーザー未登録遷移
        try {
            $admin = Auth::user()->access_auth;
            if ($admin == 0 ) {
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
                return view('shop.index', compact('shops', 'likes'));
            } else if ( $admin == 1) {
                echo $admin;
                return view('admin.repre');
            } else {
                echo $admin;
                return view('admin.index');
            }
        } catch (\Throwable $th) {
            echo "Not User registration";
            return view('shop.index',compact('shops'));
        }
        $shops = Shop::all();
        $admin = Auth::user()->access_auth;
        if (empty(Auth::id())) {
            
        }
        else if( $admin == 0 ) {
        
        } else if ($admin == 1 ) {
            return view('admin.repre');
        }
    }
    public function postshop(Request $request)
    {
        $image_path = $request->file('img_url')->store('public/test');
        $item = Auth::id();
        dd($item);
        $shop = new Shop;
        $param = [
            "name" => $request->shop_name,
            "img_url" => $image_path,
            "description" => $request->description,
            "area_id" => $request->area,
            "genre_id" => $request->genre,
            "owner_id" => Auth::id()
        ];
        dd($param);
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


    //店舗代表者のみアクセスできる
    /*
    owner_idをどうするか
    userのidを同じで良いか
    */
    public function viewReps()
    {
        $admin_id = Auth::id();
        $owner_id = Shop::get(['owner_id']);
        echo $owner_id;
        // dd($admin_id);
        // echo is_null($admin_id);
        if (is_null($admin_id)) {
            return view('admin.repre');
        } else {
            $test = Shop::where('owner_id', $admin_id)->first();
            $reservation = Reservation::where('shop_id', $test->id)->get();
            return view('admin.repre',compact('test', 'reservation'));
        }
    }
    public function shopdetail($id)
    {
        $shops = Shop::where('id', $id)->get();
        return view('shop.detail',compact('shops'));
    }
}
