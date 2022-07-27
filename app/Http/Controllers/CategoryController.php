<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller {
    public function index() {
        try {
            return view('categories.index', ['metaTitle' => 'Categories']);
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
            return view('categories.create', ['metaTitle' => 'New Category']);
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

    public function store(StoreCategoryRequest $request) {
        try {
            Category::create($request->validated());

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Category created successfully.',
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
                'status_code' => $ex->getCode()
            ]);
        }
    }

    public function update(StoreCategoryRequest $request, $id) {
        try {
            $category = Category::findOrFail($id)->first();

            $category->update($request->validated());

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Category updated successfully.',
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
                'status_code' => $ex->getCode()
            ]);
        }
    }

    public function destroy($id) {
        try {
            $category = Category::findOrFail($id)->first();

            $category->update(['deleted_at' => now()]);

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Category deleted successfully.',
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
                'status_code' => $ex->getCode()
            ]);
        }
    }
}
