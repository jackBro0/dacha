<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\AuthController;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('adminPanel');
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/admin-panel', [MainController::class, 'index'])->name('adminPanel');
    Route::resource('/category', CategoryController::class);

});
