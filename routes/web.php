<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HashKeyController;
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

// 2-6-3
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// 2-6-4
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// 2-6-5
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// 2-6-14
Route::post('/products/{product}/comment', [CommentController::class, 'store'])->name('products.comment.store')->middleware('auth');

// 2-6-15
Route::get('products/{product}/approx', [ProductController::class, 'approx'])->name('products.approx')->middleware('auth');

// 2-6-20
Route::post('/payments/complete', [OrderController::class, 'payment_complete'])->name('payments.complete');

Route::middleware('auth')->group(function () {
	Route::name("sellers.")->prefix('sellers')->middleware('seller.auth')->group(function () {
		Route::get('/', function () {
			return view('sellers.index');
		})->name('index');

        // 2-7-1
        Route::get('/products/{product}/orders', [ProductController::class, 'seller_progress_index'])->name('products.orders.index');

		// 2-7-2
		Route::get('/products/{product}/orders/cancel', [ProductController::class, 'seller_cancel_index'])->name('products.orders.cancel');

        // 2-7-3
        Route::get('/products/{product}/orders/done', [ProductController::class, 'seller_done_index'])->name('products.orders.done');
		
		// 2-7-4
		Route::get('/products', [ProductController::class, 'seller_index'])->name('products.index');

        // 2-7-5
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');

        // 2-7-6
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');

        // 2-7-7
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // 2-7-8
        Route::get('/products/{product}/comments', [CommentController::class, 'index'])->name('comments.index');

        // 2-7-9
        Route::get('/hash_keys', [HashKeyController::class, 'index'])->name('hash_keys.index');
        Route::post('/hash_keys', [HashKeyController::class, 'store'])->name('hash_keys.store');
		
        // 2-7-10
        Route::get('/orders/', [OrderController::class, 'seller_index'])->name('orders.index');

		// 2-7-11
		Route::get('/orders/cancel', [OrderController::class, 'seller_cancel_index'])->name('orders.cancel');

        // 2-7-12
        Route::get('/orders/done', [OrderController::class, 'seller_done_index'])->name('orders.done');
		
        // 2-7-13
        Route::get('/orders/{order}', [OrderController::class, 'seller_show'])->name('orders.show');
		
		// 2-7-14
		Route::patch('/orders/{order}', [OrderController::class, 'seller_update'])->name('orders.update');
	});

	Route::name("users.")->prefix('users')->group(function () {
		Route::get('/', function () {
			return view('users.index');
		})->name('index');


		// 2-6-6
		Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
		Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
		Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

		// 2-6-13
		Route::patch('/{user}/seller', [UserController::class, 'seller_update'])->name('seller');

		// 2-6-9
		Route::get('/orders/cancel', [OrderController::class, 'cancel_index'])->name('orders.cancel.index');

		// 2-6-10
		Route::get('/orders/done', [OrderController::class, 'done_index'])->name('orders.done.index');
		
		// 2-6-20
		Route::post('/orders/{order}/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');

		Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
		Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
		Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
		Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
		
		Route::get('/cart_items', [CartItemController::class, 'index'])->name('cart_items.index');
		Route::post('/cart_items', [CartItemController::class, 'store'])->name('cart_items.store');
		Route::patch('/cart_items/{cart_item}', [CartItemController::class, 'update'])->name('cart_items.update');
		Route::delete('/cart_items/{cart_item}', [CartItemController::class, 'destroy'])->name('cart_items.destroy');
	});
});

require __DIR__.'/auth.php';
