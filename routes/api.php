<?php

use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('requests', RequestController::class)->middleware('auth:sanctum');
/*Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
Route::group(['prefix' => 'requests'], function() {
    Route::get('/', [RequestController::class, 'index'])->name('requests.index');
    Route::patch('/{id}', [RequestController::class, 'update'])->name('requests.update');
})->middleware('auth:sanctum');*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');