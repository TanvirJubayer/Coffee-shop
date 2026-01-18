<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\InventoryTransaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'table')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items.product', 'user', 'payments', 'table');
        return view('orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,preparing,ready,completed,cancelled,refunded',
        ]);

        $previousStatus = $order->status;
        $newStatus = $request->status;

        // If cancelling or refunding, restore stock
        if (in_array($newStatus, ['cancelled', 'refunded']) && !in_array($previousStatus, ['cancelled', 'refunded'])) {
            $this->restoreStock($order);
        }

        $order->update(['status' => $newStatus]);

        return back()->with('success', 'Order status updated successfully.');
    }

    public function cancel(Order $order)
    {
        if (in_array($order->status, ['completed', 'refunded', 'cancelled'])) {
            return back()->with('error', 'Cannot cancel order in current status.');
        }

        DB::transaction(function () use ($order) {
            $this->restoreStock($order);
            $order->update(['status' => 'cancelled']);
        });

        return back()->with('success', 'Order cancelled successfully.');
    }

    private function restoreStock(Order $order)
    {
        foreach ($order->items as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                // Restore quantity
                $product->increment('quantity', $item->quantity);

                // Log transaction
                InventoryTransaction::create([
                    'product_id' => $product->id,
                    'type' => 'return',
                    'quantity' => $item->quantity, // positive for return (add to stock)
                    'section' => 'order_cancellation',
                    'user_id' => auth()->id(),
                    'notes' => "Order #{$order->id} {$order->status}",
                    'balance' => $product->quantity
                ]);
            }
        }
    }
}
