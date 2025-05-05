<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional: Clear existing data (be careful in production!)
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks for truncation
        // OrderDetail::truncate();
        // Order::truncate();
        // Product::truncate();
        // Customer::truncate();
        // User::truncate(); // If you want to clear users too
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks

        // Create a default user if needed
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->command->info('Seeding Products...');
        $products = Product::factory()->count(300)->create();
        $productIds = $products->pluck('id');

        $this->command->info('Seeding Customers...');
        $customers = Customer::factory()->count(1000)->create();
        $customerIds = $customers->pluck('id');

        $this->command->info('Seeding Orders and Order Details...');
        $orderCount = 4000;
        $orderProgressBar = $this->command->getOutput()->createProgressBar($orderCount);

        for ($i = 0; $i < $orderCount; $i++) {
            // Create the Order first, associating with a random customer
            $order = Order::factory()->create([
                'customer_id' => $customerIds->random(),
            ]);

            // Determine how many distinct products this order will have (1 to 10)
            $numberOfProductsInOrder = rand(1, 10);
            // Select distinct product IDs randomly
            $selectedProductIds = $productIds->random($numberOfProductsInOrder)->unique();

            $totalOrderAmount = 0;

            // Create Order Details for each selected product
            foreach ($selectedProductIds as $productId) {
                $product = $products->find($productId); // Get the product model
                if (! $product) {
                    continue;
                } // Skip if product not found (shouldn't happen)

                $quantity = rand(1, 5);
                $priceAtTime = $product->price;
                $totalLineAmount = $quantity * $priceAtTime;

                OrderDetail::factory()->create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price_at_time' => $priceAtTime,
                    'total_line_amount' => $totalLineAmount,
                ]);

                $totalOrderAmount += $totalLineAmount;
            }

            // Update the order's total amount
            $order->total_amount = $totalOrderAmount;
            $order->save();

            $orderProgressBar->advance();
        }

        $orderProgressBar->finish();
        $this->command->info("\nSeeding completed successfully!");
    }
}
