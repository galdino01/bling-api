<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->unique()->isbn13(),
            'cep' => makeCep(),
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'adjunct' => $this->faker->secondaryAddress,
            'district' => $this->faker->randomElement(['Centro','Sul','Norte','Leste','Oeste','Sudeste','Sudoeste','Nordeste','Noroeste']),
            'city' => $this->faker->city,
            'state' => $this->faker->stateAbbr,
        ];
    }
}
