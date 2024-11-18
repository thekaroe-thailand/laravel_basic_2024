<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        try { 
            $products = Product::all();
            return view('product.list', compact('products'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function form()
    {
        return view('product.form');
    }

    public function save(Request $request)
    {
        try {
            Product::create($request->all());
            return redirect('/product/list');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }   

    public function edit($id)
    {
        try {
            $product = Product::find($id);

            return view('product.form', compact('product'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->update($request->all());

            return redirect('/product/list');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function remove($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();

            return redirect('/product/list');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
