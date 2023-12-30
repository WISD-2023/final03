<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('is_display','1')->get();
		$cartItemsAmount = (auth()->user())?auth()->user()->cartItems()->count():0;

		$data = [
			'products'=>$products,
			'cart_items_amount'=>$cartItemsAmount
		];
		return view('products.index', $data);

        // // 在這裡加入顯示商品列表的邏輯
        // $products = Product::where('seller_id', auth()->user()->id)->get();
        // return view('sellers.products.index', compact('products'));
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
		if($product->is_display){
			$cartItemsAmount = (auth()->user())?auth()->user()->cartItems()->count():0;
			$canLeaveComment = false;

			if(auth()->user()){
				$ordersCount = 0;
				$commentsCount = 0;

				foreach($product->orderDetails()->get() as $orderDetail){
					if($orderDetail->order?->user->id == auth()->user()->id and $orderDetail->order?->status >= 1){
						$ordersCount++;
					}
				}

				foreach($product->comments()->get() as $comment){
					if($comment->user?->id == auth()->user()->id){
						$commentsCount++;
					}
				}

				// 如果完成訂單數大於留言數，則可以留言
				if($ordersCount > $commentsCount){
					$canLeaveComment = true;
				}
			}

			$data = [
				'product'=>$product,
				'cart_items_amount'=>$cartItemsAmount,
				'canLeaveComment'=>$canLeaveComment
			];

			return view('products.show', $data);
		}
		else
			return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * 搜尋商品
     */
    public function search(Request $request)
    {
        //
		$cartItemsAmount = (auth()->user())?auth()->user()->cartItems()->count():0;

		$data = [
			'products'=>Product::where('is_display','1')->where('name','like', '%'.$request->search.'%')->get(),
			'cart_items_amount'=>$cartItemsAmount,
			'search'=>$request->search
		];

		return view('products.search', $data);
    }

    public function approx(Product $product)
    {
        $cartItemsAmount = (auth()->user())?auth()->user()->cartItems()->count():0;
        // $product->category->products()->get()
        $data = [
            'approxProduct' => $product->name,
            'products' => $product->category->products()->get(),
            'cart_items_amount'=>$cartItemsAmount,
        ];
        return view('products.approx', $data);
    }

    public function seller_progress_index(Product $product){
        return view('sellers.products.orders.index', [
            'product_id'=>$product->id,
            'product_name'=>$product->name,
            'orderDetails'=>$product->orderDetails()->get()
        ]);
    }

    public function seller_cancel_index(Product $product){
        return view('sellers.products.orders.cancel', [
            'product_id'=>$product->id,
            'product_name'=>$product->name,
            'orderDetails'=>$product->orderDetails()->get()
        ]);
    }

    public function seller_done_index(Product $product){
        return view('sellers.products.orders.done', [
            'product_id'=>$product->id,
            'product_name'=>$product->name,
            'orderDetails'=>$product->orderDetails()->get()
        ]);
    }

    public function seller_index(){
        return view('sellers.products.index', [
            'products'=>Product::where('seller_id', auth()->user()->id)->get()
        ]);
    }
}
