<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function(){
//     return view('test.pre');
// });

Route::get('/preregister', [RegisterController::class, 'userStore']);
Route::post('/premail', [RegisterController::class, 'preStore']);
Route::get('/register/verify/{token}', [RegisterController::class, 'view']);
Route::post('/register/store', [RegisterController::class, 'create']);

Route::get('/mail/form/{id}', [MailController::class, 'index']);
Route::post('/mail/send', [MailController::class, 'send']);

Route::get('/', [ShopController::class, 'index']);
Route::get('/shop/{shop_id}', [ShopController::class, 'shopdetail']);

Route::get('/mypage', [UserController::class, 'mypage']);

//予約機能
Route::get('/reserve', [ReserveController::class, 'store']);
Route::get('/reserve/{id}', [ReserveController::class, 'remove']);

//いいね機能
Route::get('like/{shop_id}', [LikeController::class, 'like']);
Route::get('unlike/{shop_id}', [LikeController::class, 'unlike']);

//店舗代表者用機能
Route::post('/repre', [ShopController::class, 'postshop']);
Route::post('/repre/{owner_id}', [ShopController::class, 'updateshop']);

//管理者用機能
Route::get('/admin', [AdminController::class, 'adminindex']);
//店舗追加
Route::post('/store', [AdminController::class, 'createShop']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
