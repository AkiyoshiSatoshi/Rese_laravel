<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ReserveController;
use App\Http\Controllers\User\LikeController;
use App\Http\Controllers\User\StripeController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MailController;

use App\Http\Controllers\System\SystemAuthController;
use App\Http\Controllers\System\SystemController;



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

Route::get('/stripe', [StripeController::class, 'viewStripe']);
Route::get('/stripe', [StripeController::class, 'postStripe']);


//test画面 初期画面
Route::get('/test', function() {
    return view('user.thanks');
})->name('test');

Route::get('/',[ShopController::class, 'view'])->name('view');

Route::get('/preregister', [RegisterController::class, 'userStore']);

//２段階認証機能
// Route::group(['middleware' => ''], function ()
// {
    //２段階認証機能
    Route::post('/premail', [RegisterController::class, 'preStore']);
    Route::get('/register/verify/{token}', [RegisterController::class, 'view']);
    Route::post('/register/store', [RegisterController::class, 'create']);
// });

//店舗情報取得機能
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/search', [ShopController::class, 'shopsearch']);
Route::get('/shop/{shop_id}', [ShopController::class, 'shopdetail']);

//ユーザー機能
Route::group(['namespace' => 'user','prefix' => 'user'], function() {
    Route::get('/login', [UserAuthController::class, 'viewLogin'])->middleware('checked')->name('userLogin');

    Route::middleware('user')->group(function() {
        //ユーザー認証機能
        Route::post('/login', [UserAuthController::class, 'userLogin'])->name('postLogin');
    });

    //マイページ表示機能
    Route::get('/mypage', [UserController::class, 'mypage']);

    //予約機能
    Route::post('/reserve', [ReserveController::class, 'store']);

    //予約削除機能
    Route::get('/reserve/{id}', [ReserveController::class, 'remove']);

    //予約変更機能
    Route::get('/reserve/change/{id}', [ReserveController::class, 'update']);
    Route::post('/reserve/test', [ReserveController::class, 'change']);

    //いいね取得/削除機能
    Route::get('like/{shop_id}', [LikeController::class, 'like']);
    Route::get('unlike/{shop_id}', [LikeController::class, 'unlike']);
});


//ログアウト機能
Route::get('/logout',[ShopController::class, 'logout']);



//店舗代表者機能
Route::group(['namespace' => 'admin', 'prefix' => 'admin'],function(){
    //店舗代表者ログイン画面
    Route::get('/login', [AdminAuthController::class, 'viewLogin'])->middleware('checked');
    // Route::middleware('system')->group(function() {
    //Admin認証機能
        Route::post('/login', [AdminAuthController::class, 'adminLogin']);
    // });
        //自店舗作成機能
    Route::post('/store',[AdminController::class, 'createShop']);
    //自店舗情報更新機能
    Route::post('/shop/{id}',[AdminController::class, 'updateShop']);
    //メール送信機能
    Route::post('/mail/send', [MailController::class, 'send']);
    Route::get('/mail/form/{id}', [MailController::class, 'index']);
});



//管理者機能
Route::group(['namespace' => 'System', 'prefix' => 'system'], function(){
    Route::get('/login', [SystemAuthController::class, 'viewLogin'])->middleware('checked')->name('system.Login');
    Route::middleware(['system'])->group(function() {
        //管理者認証機能
    Route::post('/login', [SystemAuthController::class, 'postLogin']);
    });

    //店舗代表者作成機能
    Route::post('/post', [SystemController::class, 'adminStore']);

});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
