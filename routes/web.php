<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);

    Route::resource('trip', \App\Http\Controllers\TripController::class);
    Route::resource('car', \App\Http\Controllers\CarController::class);
    Route::resource('date', \App\Http\Controllers\DateController::class);
    Route::resource('order', \App\Http\Controllers\OrderController::class);

});
