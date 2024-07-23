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
        return [
            'item_name' => fake()->unique()->word,
            'quantity' => fake()->randomElement(['12', '7', '36']),
            'price' => fake()->randomElement(['9.99', '15.00', '49.95']),
        ];
    }
}
