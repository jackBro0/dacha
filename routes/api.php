<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DachaController;
use App\Http\Controllers\RentDachaController;
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

Route::resource('/category', CategoryController::class);
Route::resource('/dacha', DachaController::class);
Route::post('rent-dacha', [RentDachaController::class, 'rentDacha']);
Route::get('top-rated', [DachaController::class, 'topRated']);
Route::post('/favourites', [DachaController::class, 'dachaByArray']);
