<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::withCount('orders');

        $products = $query->orderBy('id', 'desc')->paginate(20);
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        $product = new Product;
        return view('products.create', ['product' => $product]);
    }

    public function store(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric'
        ]);

        $product->create($request->all());
        return redirect(route('products.index'));
    }

    public function show(Product $product)
    {
        $orders = $product->orders()->with('customer')->with('product')
            ->orderBy('created_at', 'desc')->paginate(20);
        return view('products.show', [
            'product' => $product,
            'orders' => $orders,
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric'
        ]);
        $product->update($request->all());
        return redirect(route('products.show', $product));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
