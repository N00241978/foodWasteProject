<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SurplusListingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('user', UserController::class)->middleware('auth');
Route::resource('business', BusinessController::class)->middleware('auth');
Route::resource('donation', DonationController::class)->middleware('auth');
Route::resource('order', OrderController::class)->middleware('auth');
Route::resource('payment', PaymentController::class)->middleware('auth');
Route::resource('review', ReviewController::class)->middleware('auth');
Route::resource('surplus-listing', SurplusListingController::class)->middleware('auth');