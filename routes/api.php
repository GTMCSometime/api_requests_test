<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
Route::group(['prefix' => 'requests'], function() {
    Route::get('/', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/{request}', [RequestController::class, 'show'])->name('requests.show');
    Route::put('/{request}', [RequestController::class, 'update'])->name('requests.update');
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');