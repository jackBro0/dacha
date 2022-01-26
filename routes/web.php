<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DachaController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\AuthController;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('category.index');
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/admin-panel', [MainController::class, 'index'])->name('adminPanel');

    ////////////////////// Category \\\\\\\\\\\\\\\\\\\\\
    Route::resource('/category', CategoryController::class);
    Route::get('category-delete/{category}', [CategoryController::class, 'destroy'])->name('categoryDelete');

    ////////////////////// Dacha \\\\\\\\\\\\\\\\\\\\\\\
    Route::resource('/dacha', DachaController::class);
    Route::get('dacha-delete/{category}', [DachaController::class, 'destroy'])->name('dachaDelete');

});
