<?php

use App\Http\Controllers\CommentController;
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

Route::get('/', [ItemController::class, 'index'])->name('index');

Route::get('/item/{item_id}', [ItemController::class, 'item'])->name('item.item_id');

Route::middleware('auth')->group(function () {
    Route::get('/mypage/profile', [UserController::class, 'profile']);
    Route::patch('/mypage/profile', [UserController::class, 'store2']);

    Route::get('/item/{item_id}/like', [FavoriteController::class, 'like'])->middleware('auth')->name('like');
    Route::get('/item/{item_id}/unlike', [FavoriteController::class, 'unlike'])->middleware('auth')->name('unlike');
    Route::post('/comment',[CommentController::class,'comment'])->middleware('auth')->name('comment');

    Route::get('/purchase/{item_id}', [ItemController::class, 'purchase'])->name('purchase.item_id');
    Route::post('/sale/{item_id}', [ItemController::class, 'sale'])->name('sale.item_id');

    Route::get('/purchase/address/{item_id}', [UserController::class, 'address'])->name('purchase.address.item_id');
    Route::patch('/purchase/address/{item_id}', [UserController::class, 'addressUpdate'])->name('purchase.address.item_id');

    Route::get('/sell', [ItemController::class, 'sell']);
    Route::post('/sell', [ItemController::class, 'sellPost']);

    Route::get('/mypage', [ItemController::class, 'mypage'])->name('mypage');

    Route::get('/mypage/edit', [UserController::class, 'edit']);
    Route::patch('/mypage/edit', [UserController::class, 'editUpdate']);
});
