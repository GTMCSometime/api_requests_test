<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/', App\Http\Controllers\Users\IndexController::class)->name('users.index');
});
