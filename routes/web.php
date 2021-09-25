<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SubAccountController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::any('/available/subscriptions/', [SubscriptionController::class, 'display_subscription'])->name('available.subscriptions');


    Route::post('/pay', [PaymentController::class, 'redirect_split_payment_to_gateway'])->name('pay');

    Route::get('/payment/callback', [PaymentController::class, 'handle_split_payment_gateway_callback']);

    Route::get('/games', [GameController::class, 'games'])->name('games');

    Route::get('/packages', [PackageController::class, 'packages'])->name('packages');

    Route::any('/subaccount', [SubAccountController::class, 'subaccount'])->name('subaccount');
});

Route::post('/payment/webhook', [PaymentController::class, 'handle_web_hook']);


require __DIR__ . '/auth.php';
