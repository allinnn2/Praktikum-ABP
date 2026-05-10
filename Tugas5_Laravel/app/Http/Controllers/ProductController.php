<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // tampil data
    public function index()
    {
        $products = Product::with('variants')->get();

        return view('products.index', compact('products'));
    }

    // form tambah
    public function create()
    {
        return view('products.create');
    }

    // simpan data
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect('/products');
    }

    // form edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect('/products');
    }

    // hapus data
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products');
    }
}