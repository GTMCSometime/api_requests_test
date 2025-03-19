<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'request'], function() {
    Route::get('/', App\Http\Controllers\Request\CreateController::class)->name('request.create');
    Route::post('/', App\Http\Controllers\Request\StoreController::class)->name('request.store');
});
