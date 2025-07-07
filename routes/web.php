<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\AdminDashboardController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/devices', [TrackerController::class, 'index'])->name('admin.devices.index');
    Route::post('/devices', [TrackerController::class, 'store'])->name('admin.devices.store'); // ✅ New store route
    Route::get('/devices/{device}/edit', [TrackerController::class, 'edit'])->name('admin.devices.edit');
    Route::delete('/devices/{device}', [TrackerController::class, 'destroy'])->name('admin.devices.destroy');
    Route::get('/devices/{device}/settings', [TrackerController::class, 'settings'])->name('admin.devices.settings');
});




require __DIR__.'/auth.php';
