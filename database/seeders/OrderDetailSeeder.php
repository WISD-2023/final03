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
    }
}
