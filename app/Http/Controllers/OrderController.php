<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller {
    public function index() {
        try {
            return view('orders.index', ['metaTitle' => 'Orders']);
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
            return view('orders.create', ['metaTitle' => 'New Order']);
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

    public function store(StoreOrderRequest $request) {
        try {
            Order::create($request->validated());

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Order created successfully.',
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

    public function update(StoreOrderRequest $request, $id) {
        try {
            $order = Order::findOrFail($id)->first();

            $order->update($request->validated());

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Order updated successfully.',
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
            $order = Order::findOrFail($id)->first();

            $order->update(['deleted_at' => now(), 'status' => 'inactive']);

            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Order deleted successfully.',
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
