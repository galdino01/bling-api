<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder {
    public function run() {
        // Category::factory()->count(5)->create();
        Category::create([
            'name' => 'informatica',
            'description' => null,
        ]);
        Category::create([
            'name' => 'higiene',
            'description' => null,
        ]);
        Category::create([
            'name' => 'cozinha',
            'description' => null,
        ]);
        Category::create([
            'name' => 'brinquedo',
            'description' => null,
        ]);
        Category::create([
            'name' => 'eletrodomestico',
            'description' => null,
        ]);
        Category::create([
            'name' => 'action_figure',
            'description' => null,
        ]);
    }
}
