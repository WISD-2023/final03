<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'secret_key' => Str::random(32),
            //'secret_iv' => Str::random(16),
            'secret_key' => "A8bckaUs0cQ8WpYqwZXkOj03lWFUQrxw",
            'secret_iv' => "CzEEgu89GoaKZPLP",
        ];
    }
}
