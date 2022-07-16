<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->unique()->isbn13(),
            'type' => $this->faker->randomElement(['supplier', 'customer', 'manufacturer', 'seller']),
            'name' => $this->faker->name,
            'cnpj' => cnpj(),
            'rg' => $this->faker->randomNumber(9),
            'cpf' => $this->faker->randomNumber(9) . $this->faker->randomNumber(3),
        ];
    }
}
