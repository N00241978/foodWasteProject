<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::resource('user', 'UserController')->middleware('auth');
Route::resource('business', 'BusinessController')->middleware('auth');
Route::resource('donation', 'DonationController')->middleware('auth');
Route::resource('order', 'OrderController')->middleware('auth');
Route::resource('payment', 'PaymentController')->middleware('auth');
Route::resource('review', 'ReviewController')->middleware('auth');
Route::resource('surplusListing', 'SurplusListingController')->middleware('auth');