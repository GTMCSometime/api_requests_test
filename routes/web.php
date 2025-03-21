<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'request'], function() {
    Route::get('/', App\Http\Controllers\Request\CreateController::class)->name('request.users.create');
    Route::post('/', App\Http\Controllers\Request\StoreController::class)->name('request.users.store');
    Route::get('/admin/{type?}', App\Http\Controllers\Admin\ShowController::class)->name('request.admin.show');
    
});


