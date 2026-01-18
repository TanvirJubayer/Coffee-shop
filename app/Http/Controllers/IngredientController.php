<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::orderBy('name')->get();
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'quantity' => 'required|numeric|min:0',
            'cost' => 'required|numeric|min:0',
            'alert_threshold' => 'required|numeric|min:0',
        ]);

        Ingredient::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'cost' => $request->cost,
            'alert_threshold' => $request->alert_threshold,
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingredient added successfully.');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'quantity' => 'required|numeric|min:0',
            'cost' => 'required|numeric|min:0',
            'alert_threshold' => 'required|numeric|min:0',
        ]);

        $ingredient->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'cost' => $request->cost,
            'alert_threshold' => $request->alert_threshold,
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully.');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully.');
    }
}
