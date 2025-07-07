<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Busfile\BookingForm;
use App\Http\Controllers\Auth\LogoutController;

// Custom logout route (POST only)
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Booking page (Livewire)
    Route::get('/book', BookingForm::class)->name('book');
});
