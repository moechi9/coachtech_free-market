<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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


Route::post('/register', [UserController::class, 'store1']);

Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/mypage/profile', [UserController::class, 'profile']);
    Route::post('/mypage/profile', [UserController::class, 'store2']);

    Route::get('/', [ItemController::class, 'index'])->name('index');
    // 検索機能

    Route::get('/item/{item_id}', [ItemController::class, 'item'])->name('item.item_id');
    Route::get('/item/{item_id}/like',[FavoriteController::class,'like'])->middleware('auth')->name('like');
    Route::get('/item/{item_id}/unlike', [FavoriteController::class, 'unlike'])->middleware('auth')->name('unlike');
    // いいね機能
    // コメント機能

    Route::get('/purchase/{item_id}', [ItemController::class, 'purchase'])->name('purchase.item_id');
    // 購入処理

    Route::get('/purchase/address/{item_id}', [UserController::class, 'address'])->name('purchase.address.item_id');
    Route::patch('/purchase/address/{item_id}/update', [UserController::class, 'addressUpdate'])->name('purchase.address.item_id.update');

    Route::get('/sell', [ItemController::class, 'sell']);
    // 出品処理

    Route::get('/mypage', [ItemController::class, 'mypage'])->name('mypage');

    Route::get('/mypage/edit', [UserController::class, 'edit']);
    Route::patch('/mypage/edit', [UserController::class, 'editUpdate']);
});
