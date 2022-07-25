<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller {
    public function index() {
        try {
            return view('categories.index', ['metaTitle' => 'Categories']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function create() {
        try {
            return view('categories.create', ['metaTitle' => 'New Category']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function store(StoreCategoryRequest $request) {
        try {
            Category::create($request->validated());

            return redirect(route('categories.index'))->with('success', 'Category created!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function update(StoreCategoryRequest $request, $id) {
        try {
            $category = Category::findOrFail($id)->first();

            $category->update($request->validated());

            return redirect(route('categories.index'))->with('success', 'Category updated!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function destroy($id) {
        try {
            $category = Category::findOrFail($id)->first();

            $category->update(['deleted_at' => now()]);

            return redirect(route('categories.index'))->with('success', 'Category deleted!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went'], 500);
        }
    }
}
