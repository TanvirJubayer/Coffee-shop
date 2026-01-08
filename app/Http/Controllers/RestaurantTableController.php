<?php

namespace App\Http\Controllers;

use App\Models\RestaurantTable;
use Illuminate\Http\Request;

class RestaurantTableController extends Controller
{
    public function index()
    {
        $tables = RestaurantTable::all();
        return view('tables.index', compact('tables'));
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:available,occupied,reserved',
        ]);

        RestaurantTable::create($request->all());

        return redirect()->route('tables.index')->with('success', 'Table created successfully.');
    }

    public function edit(RestaurantTable $table)
    {
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, RestaurantTable $table)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:available,occupied,reserved',
        ]);

        $table->update($request->all());

        return redirect()->route('tables.index')->with('success', 'Table updated successfully.');
    }

    public function destroy(RestaurantTable $table)
    {
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Table deleted successfully.');
    }

    public function updateStatus(Request $request, RestaurantTable $table)
    {
        $request->validate([
            'status' => 'required|in:available,occupied,reserved',
        ]);

        $table->update(['status' => $request->status]);

        return back()->with('success', 'Table status updated successfully.');
    }
}
