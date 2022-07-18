<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Str;

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
            dd($request->validated());

            $product = Product::create($request->validated());

            $product->id = (string) Str::uuid();

            // $product->price = str_replace(',', '.', $product->price);
            // $product->price_cost = str_replace(',', '.', $product->price_cost);
            // $product->width = str_replace(',', '.', $product->width);
            // $product->height = str_replace(',', '.', $product->height);
            // $product->depth = str_replace(',', '.', $product->depth);
            // $product->net_weight = str_replace(',', '.', $product->net_weight);
            // $product->gross_weight = str_replace(',', '.', $product->gross_weight);

            // $product->quantity = strtolower($product->quantity);
            // $product->warranty = strtolower($product->warranty);
            // $product->unit_of_measure = strtolower($product->unit_of_measure);

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
