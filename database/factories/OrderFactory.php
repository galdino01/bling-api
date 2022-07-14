<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->unique()->isbn13(),

            'number' => $this->faker->numberBetween(1, 100),

            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'cost_of_freight' => $this->faker->randomFloat(2, 0, 100),
            'other_expenses' => $this->faker->randomFloat(2, 0, 100),
            'total_of_products' => $this->faker->randomFloat(2, 0, 100),
            'total_sale' => $this->faker->randomFloat(2, 0, 100),
            'notes' => $this->faker->text,

            'output_date' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
        ];
    }
}
