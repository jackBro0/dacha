<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DachaController;
use App\Http\Controllers\Admin\RentDachaController;
use App\Http\Controllers\Admin\ComfortController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\AuthController;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('adminPanel');
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/admin-panel', [MainController::class, 'index'])->name('adminPanel');

    ////////////////////// Category \\\\\\\\\\\\\\\\\\\\\
    Route::resource('/category', CategoryController::class);

    ////////////////////// Dacha \\\\\\\\\\\\\\\\\\\\\\\
    Route::resource('/dacha', DachaController::class);

    ////////////////////Rent Dacha (Orders) \\\\\\\\\\\\\\
    Route::resource('/order', RentDachaController::class);

    //////////////////// Comforts \\\\\\\\\\\\\\
    Route::resource('/comfort', ComfortController::class);

    /////////////////////Password\\\\\\\\\\\\\\\\\\\\\\\\\
    Route::get('/password', [AuthController::class, 'password'])->name('password');
    Route::post('/password-change', [AuthController::class, 'passwordChange'])->name('passwordChange');

});

Route::get('test', [MainController::class, 'test'])->name('test');
