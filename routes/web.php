<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HostelController;
use App\Http\Controllers\Admin\RoomtypeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hostels/{id}', [BookController::class, 'show'])->name('book.show');
Route::post('/book', [BookController::class, 'store'])->name('book.store');

Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('hostels', HostelController::class);
    Route::resource('room-type', RoomtypeController::class);
    Route::get('/bookings', [BookController::class, 'index'])->name('bookings.index');
    Route::delete('/bookings/{id}', [BookController::class, 'destroy'])->name('bookings.destroy');
    Route::put('/bookings/{id}', [BookController::class, 'update'])->name('bookings.update');

    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
