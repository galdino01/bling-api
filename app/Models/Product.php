<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'key',
        'codigo',
        'descricao',
        'tipo',
        'situacao',
        'marca',
        'idFabricante',
        'idGrupoProduto',
        'idCategoria',
        'unidade',
        'preco',
        'precoCusto',
        'descricaoCurta',
        'descricaoComplementar',
        'dataInclusao',
        'dataAlteracao',
        'imageThumbnail',
        'urlVideo',
        'nomeFornecedor',
        'codigoFabricante',
        'class_fiscal',
        'cest',
        'origem',
        'linkExterno',
        'observacoes',
        'grupoProduto',
        'garantia',
        'descricaoFornecedor',
        'pesoLiq',
        'pesoBruto',
        'estoqueMinimo',
        'estoqueMaximo',
        'gtin',
        'gtinEmbalagem',
        'larguraProduto',
        'alturaProduto',
        'profundidadeProduto',
        'unidadeMedida',
        'itensPorCaixa',
        'volumes',
        'localizacao',
        'crossdocking',
        'condicao',
        'freteGratis',
        'producao',
        'dataValidade',
        'spedTipoItem',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
