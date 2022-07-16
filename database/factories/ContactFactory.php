<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->uuid,

            'email' => $this->faker->unique()->safeEmail(),
            'cell' => $this->faker->randomNumber(9),
            'telephone' => $this->faker->randomNumber(8),
        ];
    }
}
