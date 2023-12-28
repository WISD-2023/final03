<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::resource('/products', ProductController::class)->except(['index']);
// 2-6-14
Route::post('/products/{product}/comment', [CommentController::class, 'store'])->name('products.comment.update');
// 2-6-15
Route::get('products/{product}/approx', [ProductController::class, 'approx'])->name('products.approx');


Route::middleware('auth')->group(function () {
	Route::name("users.")->prefix('users')->group(function () {
		Route::get('/', function () {
			return view('dashboard');
		})->name('index');
		
		Route::resource('/cart_items', CartItemController::class);
		Route::resource('/orders', OrderController::class);
		
		Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
		Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
		Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

		// 2-6-13
		Route::patch('/{user}/seller', [UserController::class, 'seller_update'])->name('seller');
	});
});

require __DIR__.'/auth.php';
