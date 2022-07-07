<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'idCliente',
        'desconto',
        'observacoes',
        'observacaoInterna',
        'numero',
        'numeroOrdemCompra',
        'vendedor',
        'valorFrete',
        'outrasDespesas',
        'totalprodutos',
        'totalvenda',
        'situacao',
        'data',
        'dataSaida'
    ];
}
