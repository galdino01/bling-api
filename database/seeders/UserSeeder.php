<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Address;
use App\Models\Contact;

class UserSeeder extends Seeder {
    public function run() {
        User::factory()->count(8)->create();

        $users = User::all();

        foreach ($users as $user) {
            $user->address()->save(Address::factory()->make());
            $user->contact()->save(Contact::factory()->make());
        }
    }
}
