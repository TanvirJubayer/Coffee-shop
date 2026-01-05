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
        ]);

        return DB::transaction(function () use ($request) {
            // Create Order
            $order = Order::create([
                'user_id' => auth()->id(), // Assuming logged in user
                'table_id' => $request->table_id, // Nullable
                'total_amount' => $request->total_amount,
                'status' => 'completed', // Direct sale
                'type' => $request->table_id ? 'dine_in' : 'takeaway',
            ]);

            // Create Order Items
            foreach ($request->cart as $item) {
                $order->items()->create([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'notes' => $item['notes'] ?? null,
                ]);
                
                // Handle Addons if implemented in frontend cart structure
            }

            // Create Payment
            Payment::create([
                'order_id' => $order->id,
                'amount' => $request->total_amount,
                'payment_method' => $request->payment_method,
                'status' => 'completed',
            ]);
            
            // Limit output for JSON response
            $order->load('items');

            return response()->json([
                'success' => true,
                'order' => $order,
                'message' => 'Order processed successfully!'
            ]);
        });
    }
}
