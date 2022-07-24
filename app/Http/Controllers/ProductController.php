<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller {
    public function index() {
        try {
            return view('products.index', ['metaTitle' => 'Products']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function create() {
        try {
            $categories = Category::orderBy('name', 'asc')->whereNull('deleted_at')->get();

            return view('products.create', ['metaTitle' => 'New Product'], compact('categories'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function store(StoreProductRequest $request) {
        try {
            abort_if($request->origin !== 'national' && $request->origin !== 'imported', 400, 'Something went wrong.');

            $product = Product::create($request->validated());

            $upload = $this->storeImage($request, $product->id);

            if (!$upload) {
                return redirect()->back()->with('message', 'Failed to upload.')->withInput();
            }

            $product->update(['image' => $upload]);

            return redirect(route('products.index'))->with('success', 'Product created!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function show($id) {
        try {
            $product = Product::findOrFail($id)->first();

            return view('products.show', ['metaTitle' => 'See Product'], compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function edit($id) {
        try {
            $product = Product::findOrFail($id)->first();

            return view('products.edit', ['metaTitle' => 'Edit Product'], compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function update(StoreProductRequest $request, $id) {
        try {
            $product = Product::findOrFail($id)->first();

            $product->update($request->validated());

            return redirect(route('products.index'))->with('success', 'Product updated!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function destroy($id) {
        try {
            $product = Product::findOrFail($id)->first();

            $product->update(['deleted_at' => now(), 'status' => 'inactive']);

            return redirect(route('products.index'))->with('success', 'Product deleted!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    private function storeImage($request, $id) {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('YmdHis'));
            $extension = $request->image->extension();
            $file_name = "{$name}.{$extension}";
            $upload = $request->image->storeAs("images/products/{$id}", $file_name);

            return $upload;
        }
    }
}
