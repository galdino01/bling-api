<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nome',
        'cnpj',
        'ie',
        'rg',
        'endereco',
        'numero',
        'complemento',
        'cidade',
        'bairro',
        'cep',
        'uf',
        'email',
        'celular',
        'fone'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
