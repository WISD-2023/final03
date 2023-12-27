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
			$buyer = User::inRandomOrder()->first();
			
			CartItem::factory(10)->create([
				'user_id' => function () use ($buyer) {
					return $buyer->id;
				},
				'product_id' => function () use ($buyer) {
					$result = Product::inRandomOrder()->first();
					
					// 買家跟賣家不能是同一個人
					while($result->seller->user_id == $buyer->id){
						$result = Product::inRandomOrder()->first();
					}
					
					return $result->id;
				},
			]);
		});
		
		// 合併重複資料(GROUP BY product_id, user_id)
		// 不在上面的程式碼區塊實作是因為避免迴圈執行的太久
		CartItem::all()->each(function($cart_item){
			$result = CartItem::where('user_id',$cart_item->user_id)->where('product_id',$cart_item->product_id);
			// 如果目前的購物車項目有重複
			if($result->count() > 1){
				$result->each(function($s_cart_item) use ($cart_item){
					if($s_cart_item->id != $cart_item->id){
						$cart_item->update([
							'amount'=>$cart_item->amount+$s_cart_item->amount
						]);
						$s_cart_item->delete();
					}
				});
			}
		});
    }
}
