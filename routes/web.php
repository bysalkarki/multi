<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');



Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'admin.index')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

require __DIR__ . '/auth.php';
