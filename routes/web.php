<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'request'], function() {
    Route::get('/', App\Http\Controllers\Request\CreateController::class)->name('request.users.create');
    Route::post('/', App\Http\Controllers\Request\StoreController::class)->name('request.users.store');
   
});
Route::group(['prefix' => 'admin'], function() {    
    Route::get('/{type?}', App\Http\Controllers\Admin\IndexController::class)->name('request.admin.index');
});

Route::group(['prefix' => 'filter'], function() {  
    Route::get('/', App\Http\Controllers\Admin\Filter\IndexController::class)->name('filter.admin.index');
});
Route::get('/status', App\Http\Controllers\Admin\Filter\Status\IndexController::class)->name('filter.status.index');
Route::get('/date', App\Http\Controllers\Admin\Filter\Date\IndexController::class)->name('filter.date.index');
Route::get('/date/status', App\Http\Controllers\Admin\Filter\DateAndStatus\IndexController::class)->name('filter.dateandstatus.index');