<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Contact;

class CustomerSeeder extends Seeder {
    public function run() {
        Customer::factory()->count(8)->create();

        $customers = Customer::all();

        foreach ($customers as $customer) {
            $customer->address()->save(Address::factory()->make());
            $customer->contact()->save(Contact::factory()->make());
        }
    }
}
