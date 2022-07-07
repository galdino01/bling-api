<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller {

    protected $api_key;
    protected $api_products_list;

    public function __construct() {
        $this->api_key = env('BLING_API_KEY', '/');
    }

    public function index(Request $request) {
        try {
            if($request->search) {
                $products = Product::where([
                    ['id', 'like', '%' . $request->search . '%']
                ])->simplePaginate(1);
            } else {
                $products = Product::orderBy('dataInclusao', 'asc')->simplePaginate(5);
            }

            $this->api_products_list = Http::get('https://bling.com.br/Api/v2/produtos/json/&apikey='.$this->api_key)->json();
            $aux_api_products = $this->api_products_list['retorno']['produtos'];

            $api_products = array();
            foreach ($aux_api_products as $aux_api_product) {
                $aux_product = Product::where('id', '=', $aux_api_product['produto']['id'])->first();
                if (!$aux_product) {
                    array_push($api_products, $aux_api_product['produto']);
                }
            }

            return view('products.index', compact('api_products', 'products'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function store(Request $request) {
        try {
            $product = Product::create($request->all());

            $product->save();

            return redirect(route('products.index'))->with('message', 'Produto cadastrado!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }

    public function show($id) {
        try {
            $product = Product::with('category')->where('id', '=', $id)->first();

            return view('products.show', compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
