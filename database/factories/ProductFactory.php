<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->unique()->isbn13(),

            'gtin_code' => $this->faker->unique()->isbn13(),
            'gtin_package' => $this->faker->unique()->isbn13(),
            'cest' => $this->faker->unique()->isbn13(),

            'status' => $this->faker->randomElement(['ativo', 'inativo']),
            'code' => $this->faker->unique()->isbn13(),
            'origin' => $this->faker->randomElement(['nacional', 'importado']),
            'description' => $this->faker->text,
            'type' => $this->faker->randomElement(['unidade', 'pacote', 'caixa']),
            'brand' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'price_cost' => $this->faker->randomFloat(2, 0, 100),
            'warranty' => $this->faker->randomNumber(),
            'free_shipping' => $this->faker->randomElement(['sim', 'nao']),
            'notes' => $this->faker->text,

            'unit_of_measure' => $this->faker->randomElement(['m', 'cm', 'v', 'kg', 'g', 'ml', 'l', 'un']),
            'width' => $this->faker->randomFloat(2, 0, 100),
            'height' => $this->faker->randomFloat(2, 0, 100),
            'depth' => $this->faker->randomFloat(2, 0, 100),
            'net_weight' => $this->faker->randomFloat(2, 0, 100),
            'gross_weight' => $this->faker->randomFloat(2, 0, 100),
            'quantity' => $this->faker->randomNumber(2),
            'items_per_box' => $this->faker->randomNumber(2),
            'boxes' => $this->faker->randomNumber(2),
            'localization' => $this->faker->randomElement(['A1', 'A2', 'A3', 'B1', 'B2', 'B3', 'C1', 'C2', 'C3']),

            'image_thumbnail' => $this->faker->imageUrl(100, 100),
            'url_video' => $this->faker->url,

            'expiration_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
