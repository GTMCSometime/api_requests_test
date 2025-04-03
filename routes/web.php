<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


    
    
    Route::get('/filter', App\Http\Controllers\Admin\Filter\IndexController::class)->name('filter.admin.index');
    Route::get('/status', App\Http\Controllers\Admin\Filter\Status\IndexController::class)->name('filter.status.index');
    Route::get('/date', App\Http\Controllers\Admin\Filter\Date\IndexController::class)->name('filter.date.index');
    Route::get('/dateandstatus', App\Http\Controllers\Admin\Filter\DateAndStatus\IndexController::class)->name('filter.dateandstatus.index');


require __DIR__.'/auth.php';

Route::group(['prefix' => 'requests'], function() {
    Route::get('/', App\Http\Controllers\Request\CreateController::class)->name('requests.users.index');
    Route::post('/', App\Http\Controllers\Request\StoreController::class)->name('requests.users.store');
    
    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        Route::get('/{type?}', App\Http\Controllers\Admin\IndexController::class)->name('requests.admin.index');
        Route::get('/{request}/edit', App\Http\Controllers\Admin\EditController::class)->name('requests.admin.edit');
        Route::patch('/{request}', App\Http\Controllers\Admin\StoreController::class)->name('requests.admin.store');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
