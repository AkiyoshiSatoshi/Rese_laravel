<?php

namespace App\Http\Controllers;

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
        } catch (\Throwable $th) {
            echo "error";
        }
    }
}
