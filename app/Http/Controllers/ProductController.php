<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller {
    public function index() {
        try {
            return view('products.index');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function create() {
        try {
            $categories = Category::orderBy('name', 'asc')->whereNull('deleted_at')->get();

            return view('products.create', compact('categories'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function store(StoreProductRequest $request) {
        try {
            // TODO: Cadastro usando uma custom request não funciona

            $product = Product::create($request->validated());

            $product->save();

            return redirect(route('products.index'))->with('success', 'Product created!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }

    public function show($code) {
        try {
            $product = Product::with('category')->findOrFail($code)->first();

            return view('products.show', compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function edit($code) {
        try {
            $product = Product::with('category')->findOrFail($code)->first();

            return view('products.edit', compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function update(StoreProductRequest $request, $code) {
        try {
            $product = Product::with('category')->findOrFail($code)->first();

            $product->update($request->validated());

            return redirect(route('products.index'))->with('success', 'Product updated!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function destroy($code) {
        try {
            $product = Product::findOrFail($code);

            $product->update(['deleted_at' => now(), 'status' => 'inactive']);

            return redirect(route('products.index'))->with('success', 'Product deleted!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
