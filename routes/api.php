<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DachaController;
use App\Http\Controllers\RentDachaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavouriteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('favourite-add/{dacha_id}', [FavouriteController::class, 'addToFavourite']);
    Route::get('favourite-list', [FavouriteController::class, 'favouriteList']);
    Route::delete('favourite-delete/{dacha_id}', [FavouriteController::class, 'deleteFavourite']);
    Route::get('user/dacha', [DachaController::class, 'userDachaList']);
    Route::resource('/dacha', DachaController::class)->only('store', 'destroy', 'update');
});

Route::post('login', [AuthController::class, 'apiLogin'])->name('api.login');
Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::resource('/category', CategoryController::class);
Route::resource('/dacha', DachaController::class)->except('store', 'destroy', 'update');
Route::post('rent-dacha', [RentDachaController::class, 'rentDacha']);
Route::get('top-rated', [DachaController::class, 'topRated']);
Route::get('/favourites', [DachaController::class, 'dachaByArray']);
Route::get('/comfort', [DachaController::class, 'comfortList']);
