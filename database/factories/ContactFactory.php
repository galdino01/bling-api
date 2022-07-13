<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory {
    public function definition() {
        return [
            'id' => $this->faker->unique()->isbn13(),
            'email' => $this->faker->unique()->safeEmail(),
            'cell' => makeCell(),
            'telephone' => makeTelephone(),
        ];
    }
}
