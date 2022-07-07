<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder {
    public function run() {
        Customer::create([
            'id' => '14468549542',
            'nome' => 'MDS Contabilidade',
            'cnpj' => '37573585000149',
            'ie' => 'ISENTO',
            'rg' => null,
            'endereco' => 'Rua Dom Vilares',
            'numero' => '1580',
            'complemento' => 'Apto 44',
            'cidade' => 'São Paulo',
            'bairro' => 'Vila das Mercês',
            'cep' => '04160001',
            'uf' => 'SP',
            'email' => 'marcelomdss2@hotmail.com',
            'celular' => '(11) 98138-5365',
            'fone' => '1123859516'
        ]);
    }
}
