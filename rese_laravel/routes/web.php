<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', [GenreController::class, 'index']);

Route::get('/', [ShopController::class, 'index']);
Route::get('/shop/{shop_id}', [ShopController::class, 'shopdetail']);

Route::get('/mypage', [AdminController::class, 'mypage']);

//予約機能
Route::get('/reserve', [ReserveController::class, 'store']);
Route::get('/reserve/{id}', [ReserveController::class, 'remove']);

//いいね機能
Route::get('like/{shop_id}', [LikeController::class, 'like']);
Route::get('unlike/{shop_id}', [LikeController::class, 'unlike']);

//店舗代表者用機能
Route::get('/repre', [ShopController::class, 'viewshop']);

Route::get('/admin/test', [AdminController::class, 'adminedit']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
