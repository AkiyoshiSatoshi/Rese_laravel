<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    public function like(Request $request, $id)
    {
        $like = new Like;
        $param = [
            'shop_id' => $id,
            'user_id' => Auth::id(),
        ];
        $like->fill($param)->save();
        return redirect('/shop');
    }

    public function unlike($id)
    {
        $like = Like::where('shop_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        return redirect('/shop');
    }
}
