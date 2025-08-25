<?php

namespace App\Http\Controllers;

use App\Forms\CategoryForm;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        // create the form
        $formello = new CategoryForm(Category::class);
        // pass it to the view
        return view('categories.create', [
            'formello' => $formello
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:0,1',
        ]);

        Category::create($validated);

        return redirect()->route('home')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        // pass the model to the form
        $formello = new CategoryForm($category);
        // pass it to the view
        return view('categories.edit', [
            'formello' => $formello
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:0,1',
        ]);

        $category->update($validated);

        return redirect()->route('home')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('home')->with('success', 'Category deleted successfully.');
    }
}
