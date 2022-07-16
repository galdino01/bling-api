<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->uuid,

            'name' => $this->faker->name,
            'description' => $this->faker->text,
        ];
    }
}
