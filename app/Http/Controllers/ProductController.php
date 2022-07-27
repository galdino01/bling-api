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
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Something went wrong.',
                'class' => 'alert-danger',
                'icon' => 'exclamation-triangle-fill',
                'status_code' => $ex->getCode()
            ]);
        }
    }

    public function create() {
        try {
            $categories = Category::orderBy('name', 'asc')->whereNull('deleted_at')->get();

            return view('products.create', ['metaTitle' => 'New Product'], compact('categories'));
        } catch (\Exception $ex) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Something went wrong.',
                'class' => 'alert-danger',
                'icon' => 'exclamation-triangle-fill',
                'status_code' => $ex->getCode()
            ]);
        }
    }

    public function store(StoreProductRequest $request) {
        try {
            abort_if($request->origin !== 'national' && $request->origin !== 'imported', 400, 'Something went wrong.');

            $product = Product::create($request->validated());

            $upload = $this->storeImage($request, $product->id);

            if (!$upload) {
                return redirect()->back()->with('alert', [
                    'type' => 'error',
                    'message' => 'Failed to upload.',
                    'class' => 'alert-danger',
                    'icon' => 'exclamation-triangle-fill',
                    'status_code' => 400
                ])->withInput();
            }

            $product->update(['image' => $upload]);

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Product created successfully.',
                'class' => 'alert-success',
                'icon' => 'check-circle-fill',
                'status_code' => 201
            ]);
        } catch (\Exception $ex) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Something went wrong.',
                'class' => 'alert-danger',
                'icon' => 'exclamation-triangle-fill',
                'status_code' => $ex->getCode(),
            ])->withInput();
        }
    }

    public function update(StoreProductRequest $request, $id) {
        try {
            $product = Product::findOrFail($id)->first();

            $product->update($request->validated());

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Product updated successfully.',
                'class' => 'alert-success',
                'icon' => 'check-circle-fill',
                'status_code' => 200
            ]);
        } catch (\Exception $ex) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Something went wrong.',
                'class' => 'alert-danger',
                'icon' => 'exclamation-triangle-fill',
                'status_code' => $ex->getCode(),
            ])->withInput();
        }
    }

    public function destroy($id) {
        try {
            $product = Product::findOrFail($id)->first();

            $product->update(['deleted_at' => now(), 'status' => 'inactive']);

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Product deleted successfully.',
                'class' => 'alert-success',
                'icon' => 'check-circle-fill',
                'status_code' => 200
            ]);
        } catch (\Exception $ex) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Something went wrong.',
                'class' => 'alert-danger',
                'icon' => 'exclamation-triangle-fill',
                'status_code' => $ex->getCode(),
            ])->withInput();
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
