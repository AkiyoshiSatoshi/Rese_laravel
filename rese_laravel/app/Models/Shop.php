<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'img_url','description','area_id','genre_id','owner_id'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function areas()
    {
        return $this->belongsTo(Area::class,'area_id');
    }
    public function genres()
    {
        return $this->belongsTo(Genre::class,'genre_id');
    }
}
