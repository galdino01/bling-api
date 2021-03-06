<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->uuid,

            'cep' => $this->faker->randomNumber(8),
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'adjunct' => $this->faker->secondaryAddress,
            'district' => $this->faker->randomElement(['Centro', 'Sul', 'Norte', 'Leste', 'Oeste']),
            'city' => $this->faker->city,
            'state' => $this->faker->stateAbbr,
        ];
    }
}
