<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder {
    public function run() {
        $categories = Category::all();
        $users = User::whereNot('type', 'customer')->get();

        foreach ($categories as $category) {
            foreach ($users as $user) {
                Product::factory()->count(3)->create([
                    'category_id' => $category->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
