<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		User::all()->each(function($user){
			$i = 0;
			// 分次產生10筆訂單，避免時間戳相同
			while($i < 10){
				$time = "LA".round(microtime(true)*100).mt_rand(100,999);
				while(Order::where('no',$time)->get()->count() > 0){
					$time = "LA".round(microtime(true)*100).mt_rand(100,999);
				}
				
				Order::factory(1)->create([
					'no' => $time,
					'seller_id' => function () use ($user){
						$result = Product::inRandomOrder()->first();
						
						// 買家跟賣家不能是同一個人
						while($result->seller_id == $user->id){
							$result = Product::inRandomOrder()->first();
						}
						
						return $result->seller_id;
					},
					'user_id' => $user->id,
				]);
				
				$i++;
			}
		});
    }
}
