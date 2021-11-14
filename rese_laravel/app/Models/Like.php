<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id','shop_id'
    ];

    public function shop()
    {
        return $this->belongTo(Shop::class);
    }
    public function user()
    {
        return $this->belongTo(User::class);
    }
}
