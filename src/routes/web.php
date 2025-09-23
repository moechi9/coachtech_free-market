<?php

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
Route::post('/mypage/profile', [UserController::class, 'store2']);
Route::post('/login',[UserController::class, 'login']);

Route::middleware('auth')->group(function(){
    Route::get('/mypage/profile', [ItemController::class, 'profile']);
    Route::get('/', [ItemController::class, 'index']);
    Route::get('/item', [ItemController::class, 'item']);
    Route::get('/purchase', [ItemController::class, 'purchase']);
    Route::get('/purchase/address', [ItemController::class, 'address']);
    Route::get('/sell', [ItemController::class, 'sell']);
    Route::get('/mypage', [ItemController::class, 'mypage']);
});



