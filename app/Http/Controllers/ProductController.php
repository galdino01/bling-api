<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Http\Requests\StoreProductRequest;
use CaliCastle\Cuid;

class ProductController extends Controller {
    public function index() {
        try {
            $products = Product::orderBy('created_at', 'asc')->whereNull('deleted_at')->paginate(10);
            $categories = Category::orderBy('name', 'asc')->whereNull('deleted_at')->get();

            return view('products.index', compact('products', 'categories'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function store(StoreProductRequest $request) {
        try {
            $product = Product::create($request->validated());

            $product->id = Cuid::make('product|');

            // Handle File Upload
            if($request->hasFile('images')) {
                foreach($request->file('images') as $image) {
                    if ($image->isValid()) {
                        $filePath = $request->file('images')->store('public');

                        Image::create([
                            'product_id' => $product->id,
                            'name' => $image->getClientOriginalName(),
                            'path' => $filePath,
                        ]);
                    }
                }
            }

            $product->save();

            return redirect(route('products.index'))->with('success', 'Product created!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }

    public function show($id) {
        try {
            $product = Product::with('category')->findOrFail($id)->first();

            return view('products.show', compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function edit($id) {
        try {
            $product = Product::with('category')->findOrFail($id)->first();

            return view('products.edit', compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function update(StoreProductRequest $request, $id) {
        try {
            $product = Product::with('category')->findOrFail($id)->first();

            $product->update($request->validated());

            return redirect(route('products.index'))->with('success', 'Product updated!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function destroy($id) {
        try {
            $product = Product::findOrFail($id);

            $product->update(['deleted_at' => now(), 'status' => 'inactive']);

            return redirect(route('products.index'))->with('success', 'Product deleted!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
