<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'alert_threshold' => 'nullable|integer|min:0',
            'sku' => 'nullable|string|unique:products,sku',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('products', $imgName, 'public');
            $input['image'] = $imgName;
        }

        $slug = \Illuminate\Support\Str::slug($request->name);
        $originalSlug = $slug;
        $i = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }
        $input['slug'] = $slug;

        // Auto-generate SKU if not provided
        if (empty($input['sku'])) {
            $input['sku'] = 'SKU-' . strtoupper(uniqid());
        }

        Product::create($input);

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = \App\Models\Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
         $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'alert_threshold' => 'nullable|integer|min:0',
            'sku' => 'nullable|string|unique:products,sku,' . $product->id,
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            // Delete old image
            if ($product->image && \Illuminate\Support\Facades\Storage::disk('public')->exists('products/' . $product->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete('products/' . $product->image);
            }

            $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('products', $imgName, 'public');
            $input['image'] = $imgName;
        } else {
            unset($input['image']);
        }

        $slug = \Illuminate\Support\Str::slug($request->name);
        $originalSlug = $slug;
        $i = 1;
        while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }
        $input['slug'] = $slug;

         // Auto-generate SKU if not provided
         if (empty($input['sku'])) {
            $input['sku'] = 'SKU-' . strtoupper(uniqid());
        }

        $product->update($input);

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        // Delete image
        if ($product->image && \Illuminate\Support\Facades\Storage::disk('public')->exists('products/' . $product->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete('products/' . $product->image);
        }

        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
    public function show(Product $product)
    {
        return redirect()->route('products.edit', $product->id);
    }
}
