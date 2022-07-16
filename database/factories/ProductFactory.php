<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->unique()->isbn13(),

            'status' => $this->faker->randomElement(['ativo', 'inativo']),
            'origin' => $this->faker->randomElement(['nacional', 'importado']),
            'description' => $this->faker->text,
            'brand' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'price_cost' => $this->faker->randomFloat(2, 0, 100),
            'warranty' => $this->faker->randomNumber(),
            'notes' => $this->faker->text,

            'unit_of_measure' => $this->faker->randomElement(['m', 'cm', 'v', 'kg', 'g', 'ml', 'l', 'un']),
            'width' => $this->faker->randomFloat(2, 0, 100),
            'height' => $this->faker->randomFloat(2, 0, 100),
            'depth' => $this->faker->randomFloat(2, 0, 100),
            'net_weight' => $this->faker->randomFloat(2, 0, 100),
            'gross_weight' => $this->faker->randomFloat(2, 0, 100),

            'quantity' => $this->faker->randomNumber(2),
            'localization' => $this->faker->randomElement(['A1', 'A2', 'A3', 'B1', 'B2', 'B3', 'C1', 'C2', 'C3']),

            'images' => $this->faker->imageUrl(300, 300),

            'expiration_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
