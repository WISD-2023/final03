<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\BankAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		Seller::all()->each(function($seller){
			BankAccount::factory(3)->create([
				'seller_id' => $seller->id,
			]);
		});
    }
}
