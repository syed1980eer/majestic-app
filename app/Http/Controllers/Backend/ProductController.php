<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        if($request->has('search')){
            $products = Product::where('product_name', 'like', "%{$request->search}%")->orWhere('product_description', 'like', "%{$request->search}%")->get();
        }
        
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('products.create', compact('products'));
    }

    public function store(ProductStoreRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('message', 'Product Created Successfull');
    }

    public function edit(Product $product)
    {
        $products = Product::all();
        return view('products.edit', compact('product'));
    }

    public function update(ProductStoreRequest $request, Product $product)
    {
        $product->update($validatedData = $request->validated());
        return redirect()->route('products.index')->with('message', 'Product Updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product Deleted successfully');
    }
}
