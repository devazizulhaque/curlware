<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HostelController;
use App\Http\Controllers\Admin\RoomtypeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('hellow', HostelController::class);
    Route::resource('room-type', RoomtypeController::class);
    Route::get('/bookings', [BookController::class, 'index'])->name('bookings.index');
    Route::delete('/bookings/{id}', [BookController::class, 'destroy'])->name('bookings.destroy');
    Route::put('/bookings/{id}', [BookController::class, 'update'])->name('bookings.update');
});