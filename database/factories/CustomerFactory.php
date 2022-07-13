<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->unique()->isbn13(),
            'name' => $this->faker->name,
            'cnpj' => makeCnpj(),
            'ie' => $this->faker->randomElement(['Isento', 'Não Isento']),
            'rg' => makeRg(),
        ];
    }
}
