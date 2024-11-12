<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // Auth Routes
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');


});