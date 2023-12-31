<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		Order::all()->each(function($order){
			OrderDetail::factory(10)->create([
				'order_id' => $order->id,
				'product_id' => function () use ($order){
					// 以訂單的賣家尋找產品明細
					$result = Product::where('seller_id', $order->seller_id)->inRandomOrder()->first();
					
					return $result->id;
				},
			]);
		});
		
		// 合併重複資料(GROUP BY order_id, product_id)
		// 不在上面的程式碼區塊實作是因為避免迴圈執行的太久
		OrderDetail::all()->each(function($order){
			$result = OrderDetail::where('order_id',$order->order_id)->where('product_id',$order->product_id);
			// 如果目前的明細項目有重複
			if($result->count() > 1){
				$result->each(function($s_order) use ($order){
					if($s_order->id != $order->id){
						$order->update([
							'amount'=>$order->amount+$s_order->amount
						]);
						$s_order->delete();
					}
				});
			}
		});
    }
}
