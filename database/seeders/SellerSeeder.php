<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
		User::all()->skip(0)->take(5)->each(function($user){
			Seller::factory(1)->create([
				'user_id' => $user->id
			]);
		});
    }
}
