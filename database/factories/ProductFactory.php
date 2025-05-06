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
            'name' => $this->faker->catchPhrase(), // Use catchPhrase for product-like names
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 1000), // Price between 10.00 and 1000.00
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
