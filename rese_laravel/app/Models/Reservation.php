<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id","shop_id","num_of_users","start_at"
    ];

    public function shops()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function deleteReserve($shop_id, $user_id)
    {
        $reserve = Reservation::where('shop_id', $shop_id)->where('user_id', $user_id)->first();
        $reserve->delete();
    }
}
