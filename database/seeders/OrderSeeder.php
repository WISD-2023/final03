<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Seller;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		Seller::all()->each(function($seller){
			Order::factory(5)->create([
				'seller_id' => $seller->id,
				'user_id' => function () use ($seller) {
					$result = User::inRandomOrder()->first()->id;
					
					// 買家跟賣家不能是同一個人
					while($result == $seller->user_id){
						$result = User::inRandomOrder()->first()->id;
					}
					
					return $result;
				},
			]);
		});
		
		User::all()->each(function($user){
			Order::factory(5)->create([
				'seller_id' => function () use ($user) {
					$result = Seller::inRandomOrder()->first();
					
					// 買家跟賣家不能是同一個人
					while($result->user_id == $user->id){
						$result = Seller::inRandomOrder()->first();
					}
					
					return $result->id;
				},
				'user_id' => $user->id,
			]);
		});
    }
}
