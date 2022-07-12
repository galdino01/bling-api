<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->isbn13(),
            'customer_id' => $this->faker->randomElement(Customer::pluck('id')->toArray()),
            'cep' => makeCep(),
            'street' => $this->faker->streetName,
            'number' => makeNumber(),
            'adjunct' => $this->faker->randomElement(['Casa', 'Apto', 'Estabelecimento']),
            'district' => $this->faker->randomElement(['Centro','Sul','Norte','Leste','Oeste','Sudeste','Sudoeste','Nordeste','Noroeste']),
            'city' => $this->faker->city,
            'state' => $this->faker->randomElement(['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SE', 'SP', 'TO']),
        ];
    }
}
