<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
		$orders = auth()->user()->orders()->where('status','0')->get();
		
		$data = [
			'orders' => $orders
		];
		
		return view('users.orders.index', $data);
    }
	
    /**
     * Display a listing of the resource.
     */
    public function done_index()
    {
        //
		$orders = auth()->user()->orders()->where('status','1')->get();
		
		$data = [
			'orders' => $orders
		];
		
		return view('users.orders.done', $data);
    }
	
    /**
     * Display a listing of the resource.
     */
    public function cancel_index()
    {
        //
		$orders = auth()->user()->orders()->where('status','-1')->get();
		
		$data = [
			'orders' => $orders
		];
		
		return view('users.orders.cancel', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 在這裡加入顯示訂單相關資訊介面的邏輯
        return view('users.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 在這裡加入驗證資料、儲存訂單相關資料的邏輯

        $order = Order::create([
            // 訂單相關資料
        ]);
                foreach ($request->input('cart_items') as $cart_item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart_item['product_id'],
                'quantity' => $cart_item['quantity'],
                // 其他訂單項目相關資料
            ]);
        }
                // 可以在這裡加入重新導向到第三方金流平台的邏輯，這裡使用 Laravel 的 redirect 方法
        return redirect()->route('users.orders.checkout', ['order' => $order->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
		$data = [
			'order' => $order
		];
		
		return view('users.orders.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
		$this->authorize('update', $order);
		
		$order->update(['status'=>'-1']);
		return redirect()->route('users.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
		//
    }
}
