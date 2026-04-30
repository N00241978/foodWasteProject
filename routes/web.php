<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SurplusListingController;

use App\Models\Business;
use App\Models\SurplusListing;

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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'businesses' => Business::latest()->take(3)->get(),
        'surplus_listings' => SurplusListing::latest()->take(6)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('business', BusinessController::class)->middleware('auth');
Route::resource('donation', DonationController::class)->middleware('auth');
Route::get('/carts', [CartController::class, 'show'])->name('carts.show');
Route::resource('payment', PaymentController::class)->middleware('auth');
Route::resource('review', ReviewController::class)->middleware('auth');
Route::resource('surplus-listing', SurplusListingController::class)->middleware('auth');
Route::post('surplus-listing/reserve/{surplus_listing}', [SurplusListingController::class, 'addToCart'])->name('surplus-listing.reserve')->middleware('auth');