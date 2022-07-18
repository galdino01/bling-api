<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder {
    public function run() {
        // Category::factory()->count(5)->create();
        Category::create([
            'id' => Str::uuid(),

            'name' => 'informatica',
            'description' => null,
        ]);
        Category::create([
            'id' => Str::uuid(),

            'name' => 'higiene',
            'description' => null,
        ]);
        Category::create([
            'id' => Str::uuid(),

            'name' => 'cozinha',
            'description' => null,
        ]);
        Category::create([
            'id' => Str::uuid(),

            'name' => 'brinquedo',
            'description' => null,
        ]);
        Category::create([
            'id' => Str::uuid(),

            'name' => 'eletrodomestico',
            'description' => null,
        ]);
    }
}
