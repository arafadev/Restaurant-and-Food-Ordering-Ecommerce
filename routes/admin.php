<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminAuthController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // Auth Routes
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});