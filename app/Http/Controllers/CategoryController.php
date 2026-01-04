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
            $destinationPath = 'images/categories/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = $profileImage;
        }
        
        $input['slug'] = \Illuminate\Support\Str::slug($request->name);
        
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
            $destinationPath = 'images/categories/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }

        $input['slug'] = \Illuminate\Support\Str::slug($request->name);

        $category->update($input);

        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }
}
