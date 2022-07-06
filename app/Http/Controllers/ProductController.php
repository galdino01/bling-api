<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{

    protected $api_key;

    public function __construct()
    {
        $this->api_key = env('BLING_API_KEY', '/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::orderBy('dataInclusao', 'asc')->simplePaginate(5);

            $list = Http::get('https://bling.com.br/Api/v2/produtos/json/&apikey='.$this->api_key)->json();
            $api_products = $list['retorno']['produtos'];

            return view('products.index', compact('api_products', 'products'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = Product::create($request->all());

            $product->save();

            return redirect(route('products.index'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }
}
