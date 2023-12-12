<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
		Seller::all()->each(function($seller){
			Product::factory(10)->create([
				'seller_id' => $seller->id,
				'category_id' => function () {
					return Category::inRandomOrder()->first()->id;
				},
			]);
		});
    }
}
