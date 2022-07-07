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
        'totalProdutos',
        'totalVenda',
        'situacao',
        'data',
        'dataSaida'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'idCliente');
    }
}
