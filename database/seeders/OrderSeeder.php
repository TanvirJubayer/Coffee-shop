<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        if ($products->count() == 0) {
            return;
        }

        // Generate orders for the last 7 days
        for ($i = 0; $i < 50; $i++) {
            $randomDays = rand(0, 7);
            $createdAt = Carbon::now()->subDays($randomDays);
            
            $order = Order::create([
                'total_amount' => 0, // Will calculate below
                'status' => 'completed',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            $total = 0;
            $itemsCount = rand(1, 5);

            for ($j = 0; $j < $itemsCount; $j++) {
                $product = $products->random();
                $quantity = rand(1, 3);
                $price = $product->price;
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);

                $total += $quantity * $price;
            }

            $order->total_amount = $total;
            $order->save();
        }
    }
}
