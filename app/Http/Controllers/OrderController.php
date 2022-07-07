<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller {
    protected $api_key;
    protected $api_link;
    protected $api_orders_list;

    public function __construct() {
        $this->api_key = env('BLING_API_KEY', '/');
        $this->api_link = 'https://bling.com.br/Api/v2/pedidos/json/&apikey='.$this->api_key;
    }

    public function index(Request $request) {
        try {
            if($request->search) {
                $orders = Order::where([
                    ['id', 'like', '%' . $request->search . '%']
                ])->simplePaginate(1);
            } else {
                $orders = Order::orderBy('data', 'asc')->simplePaginate(5);
            }

            $this->api_orders_list = Http::get($this->api_link)->json();
            $aux_api_orders = $this->api_orders_list['retorno']['pedidos'];

            $api_orders = array();
            foreach ($aux_api_orders as $aux_api_order) {
                $aux_order = Order::where('id', '=', $request->id)->first();
                if (!$aux_order) {
                    array_push($api_orders, $aux_api_order['pedido']);
                }
            }

            return view('orders.index', compact('api_orders', 'orders'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function store(Request $request) {
        try {
            $order = Order::create($request->all());

            $order->save();

            return redirect(route('orders.index'))->with('message', 'Pedido cadastrado!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }

    public function show($id) {
        try {
            $order = Order::with('customer')->where('id', '=', $id)->first();

            return view('orders.show', compact('order'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
