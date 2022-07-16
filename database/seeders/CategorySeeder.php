<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use CaliCastle\Cuid;

class CategorySeeder extends Seeder {
    public function run() {
        // Category::factory()->count(5)->create();
        Category::create([
            'id' => Cuid::make('category|'),
            'name' => 'informatica',
            'description' => null,
        ]);
        Category::create([
            'id' => Cuid::make('category|'),
            'name' => 'higiene',
            'description' => null,
        ]);
        Category::create([
            'id' => Cuid::make('category|'),
            'name' => 'cozinha',
            'description' => null,
        ]);
        Category::create([
            'id' => Cuid::make('category|'),
            'name' => 'brinquedo',
            'description' => null,
        ]);
        Category::create([
            'id' => Cuid::make('category|'),
            'name' => 'eletrodomestico',
            'description' => null,
        ]);
    }
}
