<?php

namespace App\Http\Controllers;

use App\Models\InventoryTransaction;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('inventory.index', compact('products'));
    }

    public function history()
    {
        $transactions = InventoryTransaction::with(['product', 'supplier', 'user'])->latest()->get();
        return view('inventory.history', compact('transactions'));
    }

    public function adjust(Product $product)
    {
        $suppliers = Supplier::all();
        return view('inventory.adjust', compact('product', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'type' => 'required|in:purchase,sale,adjustment,return',
            'quantity' => 'required|integer|min:1',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'notes' => 'nullable|string',
        ]);

        $quantity = $request->quantity;
        $currentStock = $product->quantity;
        
        if ($request->type == 'purchase' || $request->type == 'return') {
            $newBalance = $currentStock + $quantity;
        } else {
            $newBalance = $currentStock - $quantity;
        }

        $product->update(['quantity' => $newBalance]);

        InventoryTransaction::create([
            'product_id' => $product->id,
            'supplier_id' => $request->supplier_id,
            // 'user_id' => auth()->id(), 
            'type' => $request->type,
            'quantity' => $quantity,
            'balance' => $newBalance,
            'notes' => $request->notes,
        ]);

        return redirect()->route('inventory.index')->with('success', 'Inventory updated successfully.');
    }
}
