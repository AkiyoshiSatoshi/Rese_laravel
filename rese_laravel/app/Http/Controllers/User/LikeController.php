<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function like($shop_id)
    {
        Like::like(Auth::id(), $shop_id);
        return redirect()->back();
    }

    public function unlike($shop_id)
    {
        Like::where('shop_id', $shop_id)->where('user_id', Auth::id())->delete();
        return redirect()->back();
    }
}
