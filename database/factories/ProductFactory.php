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
        // Generate a base price (integer)
        $basePrice = $this->faker->numberBetween(10, 1000);

        // Randomly decide to keep it whole or make it .90
        $finalPrice = $this->faker->boolean(75) // 75% chance of .90 price
            ? $basePrice - 0.10
            : $basePrice;

        // Ensure price is not below a minimum threshold after adjustment (e.g., not less than 0)
        $finalPrice = max(0.10, $finalPrice); // Ensure price is at least 0.10

        return [
            'name' => $this->faker->catchPhrase(), // Use catchPhrase for product-like names
            'description' => $this->faker->sentence(),
            'price' => $finalPrice, // New price logic
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
