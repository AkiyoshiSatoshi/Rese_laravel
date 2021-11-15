<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function store(Request $request)
    {
        return $request->all();
    }
}
