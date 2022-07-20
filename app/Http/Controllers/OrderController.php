<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller {
    public function index() {
        try {
            return view('orders.index', ['metaTitle' => 'Pedidos']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Alguma coisa deu errado.'], 500);
        }
    }

    public function create() {
        try {
            return view('orders.create', ['metaTitle' => 'Novo pedido']);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Alguma coisa deu errado.'], 500);
        }
    }

    public function store(StoreOrderRequest $request) {
        try {
            Order::create($request->validated());

            return redirect(route('orders.index'))->with('success', 'Pedido criado!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Alguma coisa deu errado.'], 500);
        }
    }

    public function show($id) {
        try {
            $order = Order::findOrFail($id)->first();

            return view('orders.show', ['metaTitle' => 'Ver Pedido'], compact('order'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Alguma coisa deu errado.'], 500);
        }
    }

    public function edit($id) {
        try {
            $order = Order::findOrFail($id)->first();

            return view('orders.edit', ['metaTitle' => 'Editar Pedido'], compact('product'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Alguma coisa deu errado.'], 500);
        }
    }

    public function update(StoreOrderRequest $request, $id) {
        try {
            $order = Order::findOrFail($id)->first();

            $order->update($request->validated());

            return redirect(route('orders.index'))->with('success', 'Pedido atualizado!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Alguma coisa deu errado.'], 500);
        }
    }

    public function destroy($id) {
        try {
            $order = Order::findOrFail($id)->first();

            $order->update(['deleted_at' => now(), 'status' => 'inactive']);

            return redirect(route('orders.index'))->with('success', 'Pedido deletado!');
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Alguma coisa deu errado.'], 500);
        }
    }
}
