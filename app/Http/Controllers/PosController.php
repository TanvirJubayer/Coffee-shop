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
    protected $orderService;

    public function __construct(\App\Services\OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $categories = Category::with(['products' => function ($query) {
            $query->where('status', true);
        }])->get();
        
        $products = Product::where('status', true)->get();
        $tables = RestaurantTable::where('status', '!=', 'occupied')->get(); 

        return view('pos.index', compact('categories', 'products', 'tables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|array|min:1',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'amount_received' => 'required|numeric',
            'order_type' => 'required|in:dine_in,takeaway',
            'table_id' => 'required_if:order_type,dine_in|nullable|exists:restaurant_tables,id',
        ]);

        try {
            $order = $this->orderService->createOrder($request->all());

            return response()->json([
                'success' => true,
                'order' => $order,
                'message' => 'Order processed successfully!',
                'redirect' => route('pos.invoice', $order->id) // Assuming we will create this route
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function invoice($id)
    {
        $order = Order::with(['items.product', 'user', 'table'])->findOrFail($id);
        return view('pos.invoice', compact('order'));
    }
}
