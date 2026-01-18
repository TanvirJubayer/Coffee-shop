<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\Payment;
use App\Models\InventoryTransaction;
use App\Models\RestaurantTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class OrderService
{
    /**
     * Create a new order with items, reduce stock, and log transaction.
     *
     * @param array $data
     * @return Order
     * @throws Exception
     */
    public function createOrder(array $data): Order
    {
        return DB::transaction(function () use ($data) {
            // 1. Create Order
            $order = Order::create([
                'user_id' => auth()->id() ?? null,
                'table_id' => $data['table_id'] ?? null,
                'total_amount' => $data['total_amount'],
                'discount_amount' => $data['discount_amount'] ?? 0,
                'status' => 'completed',
                'type' => $data['order_type'],
                'customer_name' => $data['customer_name'] ?? null,
                'notes' => $data['notes'] ?? null,
            ]);

            // 2. Process Items
            foreach ($data['cart'] as $item) {
                $product = Product::lockForUpdate()->find($item['id']);

                if (!$product) {
                    throw new Exception("Product #{$item['id']} not found.");
                }

                if ($product->quantity < $item['quantity']) {
                    throw new Exception("Insufficient stock for {$product->name}. Requested: {$item['quantity']}, Available: {$product->quantity}");
                }

                // Create Order Item
                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'notes' => $item['notes'] ?? null,
                ]);

                // Deduct Stock
                $newQuantity = $product->quantity - $item['quantity'];
                $product->update(['quantity' => $newQuantity]);

                // Log Inventory Transaction
                InventoryTransaction::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id() ?? null,
                    'type' => 'sale',
                    'quantity' => -$item['quantity'],
                    'balance' => $newQuantity,
                    'notes' => "Order #{$order->id}",
                ]);
            }

            // 3. Create Payment Record (Amount is the actual cost, not tendered)
            Payment::create([
                'order_id' => $order->id,
                'amount' => $data['total_amount'], 
                'tendered_amount' => $data['amount_received'] ?? $data['total_amount'],
                'payment_method' => $data['payment_method'],
                'status' => 'completed',
            ]);

            // 4. Update Table Status (if Dine-in)
            if ($data['order_type'] === 'dine_in' && !empty($data['table_id'])) {
                RestaurantTable::where('id', $data['table_id'])->update(['status' => 'occupied']);
            }

            return $order->load('items.product');
        });
    }
}
