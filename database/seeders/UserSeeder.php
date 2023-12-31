<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
		User::factory(1)->create([
			'email' => 'seller@localhost'
		]);
		User::factory(4)->create();
		User::factory(1)->create([
			'email' => 'user@localhost'
		]);
		User::factory(4)->create();
    }
}
