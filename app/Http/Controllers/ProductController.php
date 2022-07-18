<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Str;

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
            $products = Product::orderBy('created_at', 'asc')->whereNull('deleted_at')->paginate(10);
            $categories = Category::orderBy('name', 'asc')->whereNull('deleted_at')->get();

            return view('products.create', compact('products', 'categories'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function store(StoreProductRequest $request) {
        try {
            // TODO: Porque não cadastro usando uma custom request?

            // $request->merge(['id' => Str::uuid()]);

            // $product = Product::create($request->all());

            // $product->save();

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
