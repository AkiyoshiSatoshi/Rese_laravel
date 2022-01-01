<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Like;
use App\Models\Shop;
use App\Models\Test;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function createShop(Request $request)
    {
        $url = $request->file('img_url')->getClientOriginalName();
        Storage::disk('public')->putFileAs('img/shop',$request->img_url, $url);
        $item = Auth::id();
        $shop = new Shop;
        $param = [
            "name" => $request->shop_name,
            "img_url" => $url,
            "description" => $request->description,
            "area_id" => $request->area,
            "genre_id" => $request->genre,
            "owner_id" => Auth::id()
        ];
        $shop->fill($param)->save();
        $admincode = Auth::user()->access_auth;
        if ( $admincode == 1 ) {
            echo "authentication success";
            return redirect('/shop');
        } else {
            return "Not access";
        }
    }

    public function updateShop(Request $request,$id)
    {
        $shop = Shop::where('owner_id', $id)->first();
        $form = $request->all();
        unset($form['_token']);
        $shop->update($form);
        return redirect('/shop');
    }
}
