<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = $this->faker->numberBetween(1, 5); // Quantity between 1 and 5

        return [
            'quantity' => $quantity,
            'price_at_time' => 0, // Placeholder, will be set based on the product
            'total_line_amount' => 0, // Placeholder, will be calculated
        ];
    }
}
