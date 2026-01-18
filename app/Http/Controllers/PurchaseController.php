<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Ingredient;
use App\Models\InventoryTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('supplier')->latest()->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $ingredients = Ingredient::all();
        return view('purchases.create', compact('suppliers', 'products', 'ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.type' => 'required|in:product,ingredient',
            'items.*.item_id' => 'required|integer', // product_id or ingredient_id
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit_cost' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $totalAmount = 0;
            foreach ($request->items as $item) {
                $totalAmount += $item['quantity'] * $item['unit_cost'];
            }

            $purchase = Purchase::create([
                'supplier_id' => $request->supplier_id,
                'reference_no' => $request->reference_no,
                'total_amount' => $totalAmount,
                'purchase_date' => $request->purchase_date,
                'status' => 'received', // Auto-receive for now to update stock immediately
                'notes' => $request->notes,
            ]);

            foreach ($request->items as $itemData) {
                $subtotal = $itemData['quantity'] * $itemData['unit_cost'];
                
                $productId = $itemData['type'] == 'product' ? $itemData['item_id'] : null;
                $ingredientId = $itemData['type'] == 'ingredient' ? $itemData['item_id'] : null;

                PurchaseItem::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $productId,
                    'ingredient_id' => $ingredientId,
                    'quantity' => $itemData['quantity'],
                    'unit_cost' => $itemData['unit_cost'],
                    'subtotal' => $subtotal,
                ]);

                // Update Stock & Transaction
                if ($productId) {
                    $product = Product::find($productId);
                    $newBalance = $product->quantity + $itemData['quantity'];
                    $product->update(['quantity' => $newBalance, 'cost' => $itemData['unit_cost']]); // Update cost logic? optional

                    InventoryTransaction::create([
                        'product_id' => $productId,
                        'supplier_id' => $request->supplier_id,
                        'user_id' => auth()->id(),
                        'type' => 'purchase',
                        'quantity' => $itemData['quantity'],
                        'balance' => $newBalance,
                        'notes' => 'Purchase #' . $purchase->id,
                    ]);
                } elseif ($ingredientId) {
                    $ingredient = Ingredient::find($ingredientId);
                    $newBalance = $ingredient->quantity + $itemData['quantity'];
                    $ingredient->update(['quantity' => $newBalance, 'cost' => $itemData['unit_cost']]);

                    InventoryTransaction::create([
                        'ingredient_id' => $ingredientId,
                        'supplier_id' => $request->supplier_id,
                        'user_id' => auth()->id(),
                        'type' => 'purchase',
                        'quantity' => $itemData['quantity'],
                        'balance' => $newBalance,
                        'notes' => 'Purchase #' . $purchase->id,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('purchases.index')->with('success', 'Purchase recorded successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error recording purchase: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Purchase $purchase)
    {
        $purchase->load(['supplier', 'items.product', 'items.ingredient']);
        return view('purchases.show', compact('purchase'));
    }
}
