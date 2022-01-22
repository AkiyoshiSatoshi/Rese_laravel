<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

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

    public static function shopsearch($name, $area, $genre)
    {
        $query = Shop::query();
        if ( ! $area == 0 ) {
            $query->where('area_id', $area);
        } else {
            $query->with('areas');
        }
        $items = $query->get();
    }

    public static function getShops($user_id)
    {
        $shops = Shop::with('areas','genres')->with('likes', function($query){
            $query->where('user_id', Auth::id());
        })->get();
        return $shops;
    }
}
