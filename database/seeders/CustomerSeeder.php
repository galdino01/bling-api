<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder {
    public function run() {
        Customer::create([
            'id' => '14468549542',
            'name' => 'MDS Contabilidade',
            'cnpj' => '37573585000149',
            'ie' => 'ISENTO',
            'rg' => null,
            'address' => 'Rua Dom Vilares',
            'number' => '1580',
            'adjunct' => 'Apto 44',
            'city' => 'São Paulo',
            'district' => 'Vila das Mercês',
            'cep' => '04160001',
            'uf' => 'SP',
            'email' => 'marcelomdss2@hotmail.com',
            'cell' => '(11) 98138-5365',
            'telephone' => '1123859516'
        ]);
    }
}
