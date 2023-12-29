<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
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
		$seller_orders = auth()->user()->orders()->where('status','-1')->get();

		$data = [
			'orders' => $seller_orders
		];

		return view('users.orders.cancel', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 產生訂單序號
        $orderNo = "LA".round(microtime(true)*100).mt_rand(100,999);
        while(Order::where('no',$orderNo)->get()->count() > 0){
            $orderNo = "LA".round(microtime(true)*100).mt_rand(100,999);
        }

        // 創建訂單
        $createOrder = new Order();
        $createOrder->no = $orderNo;
        $createOrder->user_id = auth()->user()->id;
        $createOrder->status = '0';
        $createOrder->save();
        // 提取購物車內容
        $cartItems = auth()->user()->cartItems()->get();
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderDetail();
            $orderItem->order_id = $createOrder->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->amount = $cartItem->amount;
            $orderItem->save();
            $cartItem->delete();
        }
        // return
        return redirect()->route('users.orders.checkout');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
		$orderStatus = '';

		switch($order->status){
			case '1':
				$orderStatus = ' • 已完成';break;
			case '-1':
				$orderStatus = ' • 已取消';break;
		}

		$data = [
			'order' => $order,
			'orderStatus' => $orderStatus
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

    /**
     * Remove the specified resource from storage.
     */
    public function checkout()
    {
		//
    }
}
