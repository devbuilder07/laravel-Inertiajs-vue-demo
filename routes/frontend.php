<?php

use App\Http\Controllers\Frontend\{PublicController, ListingController};
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
});
Route::resource('listing', ListingController::class);
