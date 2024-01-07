<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){return view('welcome');});

Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);

Route::get('/create', function(){return view('create');})->middleware(['auth', 'verified']);

Route::POST('/create', [App\Http\Controllers\ProductController::class, 'store'])->middleware(['auth', 'verified']);

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->middleware(['auth', 'verified']);

Route::post('/add/{id}', [App\Http\Controllers\CartController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/reduce/{id}', [App\Http\Controllers\CartController::class, 'reduce'])->middleware(['auth', 'verified']);
Route::post('/delete/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function(){return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
