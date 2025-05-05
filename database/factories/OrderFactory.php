<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Try to get a random existing customer, or create one if none exist
        $customer = Customer::inRandomOrder()->first() ?? Customer::factory()->create();

        return [
            'customer_id' => $customer->id,
            'order_date' => $this->faker->dateTimeBetween('-2 years', 'now'), // Wider date range
            'total_amount' => 0, // Initialize total amount, will be calculated in the seeder
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
        ];
    }
}
