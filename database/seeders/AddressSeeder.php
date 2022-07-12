<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder {
    public function run() {
        Address::factory()->count(8)->create();
    }
}
