<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Shop;


class GenreController extends Controller
{
    public function index()
    {
        // $genre = Shop::with('genres')->get();
        $genre = Genre::with('shops')->get();
        dd($genre);
    }
}
