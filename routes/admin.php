<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

// روت‌های بدون احراز هویت
Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
Route::post('/login', [AdminAuthController::class, 'authenticate'])->name('authenticate');
Route::get('/forget-password', [AdminAuthController::class, 'PasswordRequest'])->name('password.request');

// روت‌های با احراز هویت
Route::middleware(['auth', 'user.type:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});
