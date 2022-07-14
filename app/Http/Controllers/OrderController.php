<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller {
    public function index() {
        try {
            $orders = Order::orderBy('created_at', 'asc')->get();

            return view('orders.index', compact('orders'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function store(StoreOrderRequest $request) {
        try {
            $order = Order::create($request->validated());

            $order->save();

            return redirect(route('orders.index'))->with('message', 'Order created!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }

    public function show($id) {
        try {
            $order = Order::with('customer')->findOrFail($id)->first();

            return view('orders.show', compact('order'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
