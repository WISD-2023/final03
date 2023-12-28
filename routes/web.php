<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
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
Route::post('/products/{product}/comment', [CommentController::class, 'store'])->name('products.comment.update');

Route::middleware('auth')->group(function () {
	Route::prefix('users')->group(function () {
		Route::get('/', function () {
			return view('dashboard');
		})->name('users.index');
		
		Route::resource('/cart_items', CartItemController::class);
		
		Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
		Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
		Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

		// 2-6-13
		Route::patch('/{user}/seller', [UserController::class, 'seller_update'])->name('users.seller');

	});
});

require __DIR__.'/auth.php';
