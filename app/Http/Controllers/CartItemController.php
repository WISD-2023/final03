<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$data = [
			'cart_items'=>auth()->user()->cartItems()->get()
		];
        return view('users.cart_items.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartItemRequest $request)
    {
        $product = Product::find($request->product);
		
		if($product != null){
			$cart_item = CartItem::where('user_id', auth()->user()->id)->where('product_id', $product->id);
			if($cart_item->count() == 0){
				$cart_item = new CartItem();
				$cart_item->user_id = auth()->user()->id;
				$cart_item->product_id = $product->id;
				$cart_item->amount = 1;
				$cart_item->save();
			}
			else{
				$cart_item->first()->update(['amount'=>$cart_item->first()->amount + 1]);
			}
		}
		
		return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        //
		$this->authorize('update', $cartItem);
		
		$cartItem->update($request->all());
		return redirect()->route('users.cart_items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        //
		$this->authorize('update', $cartItem);
		
		$cartItem->delete();
		return redirect()->route('users.cart_items.index');

        // // 在這裡加入刪除購物車商品的邏輯
        // $cart_item->delete();

        // // 可以在這裡加入刪除成功的訊息，這裡使用 Laravel 的 with 方法，需要在相應的 view 中顯示
        // return redirect()->back()->with('success', '商品已從購物車中刪除');
        // return view('userss.cart_items.destroy');
    }
}
