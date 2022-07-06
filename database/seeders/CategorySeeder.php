<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => '4208042',
            'descricao' => 'Produtos de Venda',
        ]);

        Category::create([
            'id' => '3720248',
            'descricao' => 'Categoria padrão',
        ]);

        $this->call(CategorySeeder::class);
    }
}
