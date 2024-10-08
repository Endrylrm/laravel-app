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
            'name' => fake()->text(10),
            'value' => fake()->randomFloat(2),
            'amount' => fake()->numberBetween(0, 300),
            'user_id' => 0,
            'updated_by' => 0,
        ];
    }
}
