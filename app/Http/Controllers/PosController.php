<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\RestaurantTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $products = Product::where('status', true)->get();
        $tables = RestaurantTable::where('status', '!=', 'occupied')->get(); // Example filter

        return view('pos.index', compact('categories', 'products', 'tables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|array',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'amount_received' => 'required|numeric',
            'order_type' => 'required|in:dine_in,takeaway',
            'table_id' => 'required_if:order_type,dine_in|nullable|exists:restaurant_tables,id',
        ]);

        return DB::transaction(function () use ($request) {
            // Create Order
            $order = Order::create([
                'user_id' => auth()->id(),
                'table_id' => $request->table_id,
                'total_amount' => $request->total_amount,
                'status' => 'completed',
                'type' => $request->order_type,
            ]);

            // Create Order Items and Update Inventory
            foreach ($request->cart as $item) {
                $order->items()->create([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'notes' => $item['notes'] ?? null,
                ]);

                // Reduce Stock
                $product = Product::findOrFail($item['id']);
                $newBalance = $product->quantity - $item['quantity'];
                $product->update(['quantity' => $newBalance]);

                // Log Transaction
                \App\Models\InventoryTransaction::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id(),
                    'type' => 'sale',
                    'quantity' => $item['quantity'],
                    'balance' => $newBalance,
                    'notes' => 'POS Sale - Order #' . $order->id,
                ]);
            }

            // Create Payment
            Payment::create([
                'order_id' => $order->id,
                'amount' => $request->total_amount,
                'payment_method' => $request->payment_method,
                'status' => 'completed',
            ]);

            // Update Table Status if Dine-in
            if ($request->order_type === 'dine_in' && $request->table_id) {
                \App\Models\RestaurantTable::where('id', $request->table_id)
                    ->update(['status' => 'occupied']);
            }
            
            $order->load('items');

            return response()->json([
                'success' => true,
                'order' => $order,
                'message' => 'Order processed successfully!'
            ]);
        });
    }
}
