<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\NewebPay\MPG;
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
     * Display a listing of the resource.
     */
    public function seller_index()
    {
        //
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
		
        // 提取購物車內容
        $cartItems = auth()->user()->cartItems()->get();
		
		if($cartItems->count() == 0){
			return redirect()->route('users.cart_items.index');
		}
		else{
			// 創建訂單
			$createOrder = new Order();
			$createOrder->no = $orderNo;
			$createOrder->user_id = auth()->user()->id;
			$createOrder->status = '0';
			$createOrder->save();
			foreach ($cartItems as $cartItem) {
				$orderItem = new OrderDetail();
				$orderItem->order_id = $createOrder->id;
				$orderItem->product_id = $cartItem->product_id;
				$orderItem->amount = $cartItem->amount;
				$orderItem->save();
				$cartItem->delete();
			}
			
			// return
			return $this->checkout($createOrder);
		}
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
     * Display the specified resource.
     */
    public function seller_show(Order $order)
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

		return view('sellers.orders.show', $data);
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
     * 產生訂單
     */
    public function checkout(Order $order)
    {
		//
		$mpg = new MPG();
		$mpg->ServiceURL			= "https://ccore.newebpay.com/MPG/mpg_gateway";		// API服務位置 (此為測試環境網址)
		$mpg->ReturnURL				= route('products.index');	// 支付完成，返回商店網址
		$mpg->NotifyURL				= route('payments.complete');	// 支付通知網址
		$mpg->ClientBackURL			= route('users.orders.index');  // 返回商店網址
		
		$mpg->HashKey				= auth()->user()->seller->secret_key;	// Hashkey
		$mpg->HashIV				= auth()->user()->seller->secret_iv;	// HashIV
		$mpg->MerchantID			= auth()->user()->seller->merchant;				// MerchantID
		$mpg->MerchantTradeNo		= $order->no;						// 訂單編號
		$mpg->Version				= '1.6';						// API程式版本
		
		$mpg->Amount = 0;
		foreach($order->orderDetails()->get() as $orderDetail){
			$mpg->Amount += $orderDetail->amount * $orderDetail->product->price;
		}

		$mpg->Order_Title			= $order->no;
		$mpg->ExpireDate			= 3;
		
		
		return $mpg->getOutput();
    }
	
    /**
     * 藍新付款回傳
     */
	public function payment_complete(Request $request){
		if($_SERVER['HTTP_USER_AGENT'] == "pay2go"){
			if($request->Status == "SUCCESS" and $request->MerchantID and $request->TradeInfo){
				$seller = Seller::where('merchant', $request->MerchantID)->get()->first();
				if($seller != null){
					$mpg = new MPG();
					$mpg->HashKey = $seller->secret_key;
					$mpg->HashIV = $seller->secret_iv;
					$data_raw = $mpg->create_aes_decrypt($request->TradeInfo, $mpg->HashKey, $mpg->HashIV);

					if($data_raw){
						$data = json_decode($data_raw,true);
						
						$order = Order::where('no', $data['Result']['MerchantOrderNo'])->first();
						$order->status = '1';
						$order->save();
						
						echo "1|OK";
					}
				}
			}
		}
	}
}
