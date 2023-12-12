<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		Product::all()->each(function($product){
			$buyer = User::inRandomOrder()->first()->id;
			
			CartItem::factory(10)->create([
				'member_id' => function () use ($buyer) {
					return $buyer;
				},
				'product_id' => function () use ($buyer) {
					$result = Product::inRandomOrder()->first();
					
					// 買家跟賣家不能是同一個人
					while($result->seller->member_id == $buyer){
						$result = Product::inRandomOrder()->first();
					}
					
					return $result->id;
				},
			]);
		});
    }
}
