<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);



Route::get('/cart', [CartController::class, 'index'])->middleware(['auth', 'verified']);

Route::post('/add/{id}', [CartController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/reduce/{id}', [CartController::class, 'reduce'])->middleware(['auth', 'verified']);
Route::post('/delete/{id}', [CartController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function(){return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    Route::get('/create',  [App\Http\Controllers\ProductController::class, 'create'])->middleware(['auth', 'verified'])->middleware('isAdmin');
    
    // Route::get('/create',  function(){return view('welcome');})->middleware(['auth', 'verified']);

    Route::POST('/create', [App\Http\Controllers\ProductController::class, 'store'])->middleware(['auth', 'verified'])->middleware('isAdmin');


require __DIR__.'/auth.php';
