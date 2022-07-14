<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller {
    public function index() {
        try {
            $products = Product::orderBy('created_at', 'asc')->whereNull('deleted_at')->paginate(10);

            return view('products.index', compact('products'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function store(StoreProductRequest $request) {
        try {
            $product = Product::create($request->validated());

            $product->save();

            return redirect(route('products.index'))->with('message', 'Product created!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }

    public function show($id) {
        try {
            $product = Product::with('category', 'user')->findOrFail($id)->first();

            return view('products.show', compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function edit($id) {
        try {
            $product = Product::with('category', 'user')->findOrFail($id)->first();

            return view('products.edit', compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function update(StoreProductRequest $request, $id) {
        try {
            $product = Product::findOrFail($id);

            $product->update($request->validated());

            return redirect(route('products.index'))->with('message', 'Product updated!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function destroy($id) {
        try {
            $product = Product::findOrFail($id);

            $product->update([
                'deleted_at' => now()
            ]);

            return redirect(route('products.index'))->with('message', 'Product deleted!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
