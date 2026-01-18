<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::latest()->get();
        return view('discounts.index', compact('discounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:discounts',
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'min_order' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        Discount::create($request->all());

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:discounts,code,' . $discount->id,
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'min_order' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        $discount->update($request->all());

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }

    /**
     * Verify discount code (API for POS).
     */
    public function verify(Request $request)
    {
        $code = $request->get('code');
        $total = $request->get('total', 0);

        $discount = Discount::where('code', $code)->first();

        if (!$discount) {
            return response()->json([
                'valid' => false,
                'message' => 'Invalid discount code.'
            ]);
        }

        if (!$discount->isValid($total)) {
            $message = 'Discount is not applicable.';
            if ($discount->min_order > $total) {
                $message = "Minimum order of \${$discount->min_order} required.";
            } elseif (!$discount->is_active) {
                $message = 'Discount is inactive.';
            } else {
                $message = 'Discount is expired or not yet valid.';
            }

            return response()->json([
                'valid' => false,
                'message' => $message
            ]);
        }

        $amount = $discount->calculateDiscount($total);

        return response()->json([
            'valid' => true,
            'amount' => $amount,
            'message' => 'Discount applied successfully!',
            'discount' => [
                'type' => $discount->type,
                'value' => $discount->value,
                'name' => $discount->name
            ]
        ]);
    }
}
