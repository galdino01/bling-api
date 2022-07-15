<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder {
    public function run() {
        $categories = Category::all();

        foreach ($categories as $category) {
            Product::factory()->count(1000)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
