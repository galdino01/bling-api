<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    public function run() {
        Category::create([
            'id' => '4208042',
            'description' => 'Produtos de Venda',
        ],[
            'id' => '3720248',
            'description' => 'Categoria padrão',
        ]);
    }
}
