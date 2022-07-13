<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller {
    protected $api_key;
    protected $api_link;
    protected $api_products_list;

    public function __construct() {
        $this->api_key = env('BLING_API_KEY', '/');
        $this->api_link = 'https://bling.com.br/Api/v2/produtos/json/&apikey='.$this->api_key;
    }

    public function index() {
        try {
            $products = Product::orderBy('inclusion_date', 'asc')->get();

            return view('products.index', compact('products'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function store(Request $request) {
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
            $product = Product::with('category')->findOrFail($id)->first();

            return view('products.show', compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
