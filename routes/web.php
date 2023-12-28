<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SellerOrderController;
use App\Http\Controllers\CommentController;
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
// 2-7-1
Route::get('sellers/orders', [SellerOrderController::class, 'index'])->name('sellers.orders');
// 2-7-2
Route::get('sellers/orders/income', [SellerOrderController::class, 'income_index'])->name('sellers.orders.income.index');
// 2-7-3
Route::get('sellers/orders/{order}', [OrderController::class, 'show'])->name('sellers.orders.show');
// 2-7-4
Route::get('sellers/products', [ProductController::class, 'index'])->name('sellers.products.index');

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
		
		// 2-6-20
		Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
		
		// 2-6-9
		Route::get('/orders/cancel', [OrderController::class, 'cancel_index'])->name('orders.cancel.index');
		
		// 2-6-10
		Route::get('/orders/done', [OrderController::class, 'done_index'])->name('orders.done.index');
	});
});

require __DIR__.'/auth.php';
