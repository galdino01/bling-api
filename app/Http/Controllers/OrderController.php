<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller {
    public function index() {
        try {
            return view('orders.index', ['metaTitle' => 'Orders']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function create() {
        try {
            return view('orders.create', ['metaTitle' => 'New Order']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function store(StoreOrderRequest $request) {
        try {
            Order::create($request->validated());

            return redirect(route('orders.index'))->with('success', 'Order created!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function update(StoreOrderRequest $request, $id) {
        try {
            $order = Order::findOrFail($id)->first();

            $order->update($request->validated());

            return redirect(route('orders.index'))->with('success', 'Order updated!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong.'], 500);
        }
    }

    public function destroy($id) {
        try {
            $order = Order::findOrFail($id)->first();

            $order->update(['deleted_at' => now(), 'status' => 'inactive']);

            return redirect(route('orders.index'))->with('success', 'Order deleted!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went'], 500);
        }
    }
}
