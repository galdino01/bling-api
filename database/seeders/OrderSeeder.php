<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class OrderSeeder extends Seeder {
    public function run() {
        $users = User::where('type', 'seller')->get();

        foreach ($users as $user) {
            Order::factory()->create([
                'user_id' => $user->id,
            ]);
        }

        $orders = Order::all();

        foreach ($orders as $order) {
            $products = Product::take(3)->get();
            $order->products()->saveMany($products);
        }

    }
}
