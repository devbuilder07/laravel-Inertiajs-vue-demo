<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\ListingController;
use App\Http\Controllers\Frontend\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
});
Route::resource('listing', ListingController::class);

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::delete('/logout', 'destroy')->name('logout');
});
