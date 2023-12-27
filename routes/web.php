<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
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

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::resource('/users/cart_items', CartItemController::class)->middleware(['auth', 'verified']);


Route::prefix('users')->group(function () {
	Route::get('/', function () {
		return view('dashboard');
	})->name('users');
	
    Route::resource('/cart_items', CartItemController::class);
	
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
})->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
