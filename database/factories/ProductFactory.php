<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$arr = array("特大","大","中","小","特小","客製化");
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'photo_url' => 'https://picsum.photos/seed/'.$this->faker->company.'/476/318',
            'amount' => mt_rand(2000,15000),
            'format' => $arr[mt_rand(0,5)],
            'price' => mt_rand(5,200),
            'is_display' => rand(0,1),
        ];
    }
}
