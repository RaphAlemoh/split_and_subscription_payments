<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::any('/available/subscriptions/', [SubscriptionController::class, 'display_subscription'])->name('available.subscriptions');
});



require __DIR__.'/auth.php';
