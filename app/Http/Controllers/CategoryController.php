<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ]);
        
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('categories', $imgName, 'public');
            $input['image'] = $imgName;
        }
        
        $slug = \Illuminate\Support\Str::slug($request->name);
        $originalSlug = $slug;
        $i = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }
        $input['slug'] = $slug;
        
        Category::create($input);
        
        return redirect()->route('categories.index')->with('success','Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            // Delete old image
            if ($category->image && \Illuminate\Support\Facades\Storage::disk('public')->exists('categories/' . $category->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete('categories/' . $category->image);
            }

            $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('categories', $imgName, 'public');
            $input['image'] = $imgName;
        } else {
            unset($input['image']);
        }

        $slug = \Illuminate\Support\Str::slug($request->name);
        $originalSlug = $slug;
        $i = 1;
        while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }
        $input['slug'] = $slug;

        $category->update($input);

        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }

    public function destroy(Category $category)
    {
        // Delete image
        if ($category->image && \Illuminate\Support\Facades\Storage::disk('public')->exists('categories/' . $category->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete('categories/' . $category->image);
        }

        $category->delete();
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }
}
