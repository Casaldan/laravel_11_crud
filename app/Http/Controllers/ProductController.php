<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products,code',
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'code' => 'required|unique:products,code,' . $product->id,
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Optionally, delete the file from storage if it exists
        if ($product->file_path && \Storage::disk('public')->exists($product->file_path)) {
            \Storage::disk('public')->delete($product->file_path);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    // Add show, edit, update, destroy as needed
}
