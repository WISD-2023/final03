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
					if($orderDetail->order->user->id == auth()->user()->id){
						$ordersCount++;
					}
				}
				
				foreach($product->comments()->get() as $comment){
					if($comment->user->id == auth()->user()->id){
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
        // // 在這裡加入顯示近似商品列表及價格的邏輯
        // // 可以使用 Eloquent 或其他方法獲取近似商品的資料

        // $approxProducts = $product->getApproxProducts(); // 這只是一個假設的方法，實際使用時應該根據你的業務邏輯進行實現

        // // 顯示近似商品列表及價格的 view
        // return view('products.approx', compact('approxProducts'));
        return view('products.approx');
    }
}
