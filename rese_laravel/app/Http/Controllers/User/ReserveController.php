<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReserveController extends Controller
{
    public function store(ReservationRequest $request)
    {
        try {
            $reservation = new Reservation;
            $datetimes =$request->date . ":" . $request->time;
            $param = [
                "user_id" => $request->user_id,
                "shop_id" => $request->shop_id,
                "start_at" => $datetimes,
                "num_of_users" => $request->number,
            ];
            //予約保存機能
            $reservation->fill($param)->save();
            return view('user.thanks');
        } catch (\Throwable $th) {
            echo "error";
        }
    }

    public function remove($id)
    {
        $reserve = Reservation::where('shop_id', $id)->where('user_id', Auth::id())->first();
        $reserve->delete();
        return redirect()->back();
    }
    public function update($id)
    {
        $reserve = Reservation::find($id);
        return view('shop.reserve__change', compact('reserve'));
    }

    public function change(Request $request)
    {
        $reserve = Reservation::find($request->id);
        $datetimes =$request->date . ":" . $request->time;
        $param = [
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
            "start_at" => $datetimes,
            "num_of_users" => $request->number
        ];
        $reserve->update($param);
        return redirect('/user/mypage');
    }
}