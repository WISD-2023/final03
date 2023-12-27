<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::all();
		$cartItemsAmount = (auth()->user())?auth()->user()->cartItems()->count():0;

		$data = [
			'products'=>$products,
			'cart_items_amount'=>$cartItemsAmount
		];
		return view('products.index', $data);
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
			'products'=>Product::where('name','like', '%'.$request->search.'%')->get(),
			'cart_items_amount'=>$cartItemsAmount,
			'search'=>$request->search
		];

		return view('products.search', $data);
    }
}
