<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->uuid,

            'type' => $this->faker->randomElement(['admin', 'employee']),
            'name' => $this->faker->name,
            'rg' => $this->faker->randomNumber(9),
            'cpf' => $this->faker->randomNumber(9) . $this->faker->randomNumber(3),
        ];
    }
}
