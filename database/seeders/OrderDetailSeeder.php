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
					$result = Product::inRandomOrder()->first();
					
					// 買家跟賣家不能是同一個人
					while($result->seller_id == $order->seller_id){
						$result = Product::inRandomOrder()->first();
					}
					
					return $result->id;
				},
			]);
		});
    }
}
