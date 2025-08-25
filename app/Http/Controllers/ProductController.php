<?php

namespace App\Http\Controllers;

use App\Forms\ProductForm;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // create the form
        $formello = new ProductForm(Product::class);
        // pass it to the view
        return view('products.create', [
            'formello' => $formello
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255|unique:products,title',
            'description' => 'nullable|string',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
            'in_stock'    => 'nullable|integer|min:0',
            'status'      => 'required|in:0,1',
        ]);

        $validated['slug'] = Str::slug($validated['title'], '_');

        Product::create($validated);

        return redirect()->route('home')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        // pass the model to the form
        $formello = new ProductForm($product);
        // pass it to the view
        return view('products.edit', [
            'formello' => $formello
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|unique:products,slug,' . $product->id,
            'description' => 'nullable|string',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
            'in_stock'    => 'nullable|integer|min:0',
            'status'      => 'required|in:0,1',
        ]);

        $product->update($validated);

        return redirect()->route('home')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('home')->with('success', 'Product deleted successfully.');
    }
}
