<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('product.index', ['products' => $products]);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'count' => 'required',
        ]);
        Product::create($data);
        return redirect()->route('index')->with('create', 'Product created successfully.');
    }
    public function edit(Request $request , Product $product)
    {
        $product = Product::findOrFail($request->id);
        return view('product.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'count' => 'required',
        ]);
        $product->update($data);
        return redirect()->route('index')->with('update', 'Product updated successfully.');
    }
    public function destroy(Request $request, Product $product)
    {
        $id = $request->id;
        $destroy = Product::findOrFail($id);
        $destroy->delete();
        return redirect()->route('index')->with('delete', 'Product deleted successfully.');
    }
}
