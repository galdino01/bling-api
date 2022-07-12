<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->isbn13(),
            'customer_id' => $this->faker->randomElement(Customer::pluck('id')->toArray()),
            'email' => $this->faker->unique()->safeEmail(),
            'cell' => makeCell(),
            'telephone' => makeTelephone(),
        ];
    }
}
