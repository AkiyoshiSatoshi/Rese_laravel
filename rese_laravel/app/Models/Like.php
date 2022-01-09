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
        return $this->belongsTo(Shop::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like($user_id, $shop_id)
    {
        $param = [
            'shop_id' => $shop_id,
            'user_id' => $user_id,
        ];
        $like = Like::create($param);
        return $like;
    }
}
