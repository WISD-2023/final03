<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		Product::all()->each(function($product){
			Comment::factory(5)->create([
				'product_id' => $product->id,
				'member_id' => function () use ($product) {
					$result = User::inRandomOrder()->first();
					
					while($product->seller->member_id == $result->id){
						$result = User::inRandomOrder()->first();
					}
					
					return $result->id;
				},
			]);
		});
    }
}
