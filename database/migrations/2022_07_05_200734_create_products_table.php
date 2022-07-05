<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->unique()->primary();

            $table->string('idFabricante')->nullable();
            $table->string('idGrupoProduto');
            $table->string('idCategoria');

            $table->string('codigo');
            $table->string('descricao');
            $table->string('tipo');
            $table->string('situacao');
            $table->string('unidade');
            $table->string('preco');
            $table->string('precoCusto')->nullable();
            $table->string('descricaoCurta')->nullable();
            $table->string('descricaoComplementar')->nullable();
            $table->string('dataInclusao');
            $table->string('dataAlteracao');
            $table->string('imageThumbnail')->nullable();
            $table->string('urlVideo')->nullable();
            $table->string('nomeFornecedor')->nullable();
            $table->string('codigoFabricante')->nullable();
            $table->string('marca');
            $table->string('class_fiscal');
            $table->string('cest');
            $table->string('origem');
            $table->string('linkExterno')->nullable();
            $table->string('observacoes')->nullable();
            $table->string('grupoProduto')->nullable();
            $table->string('garantia')->nullable();
            $table->string('descricaoFornecedor')->nullable();
            $table->string('pesoLiq');
            $table->string('pesoBruto');
            $table->string('estoqueMinimo');
            $table->string('estoqueMaximo');
            $table->string('gtin')->nullable();
            $table->string('gtinEmbalagem')->nullable();
            $table->string('larguraProduto');
            $table->string('alturaProduto');
            $table->string('profundidadeProduto');
            $table->string('unidadeMedida');
            $table->integer('itensPorCaixa');
            $table->integer('volumes');
            $table->string('localizacao')->nullable();
            $table->string('crossdocking');
            $table->string('condicao');
            $table->string('freteGratis');
            $table->string('producao');
            $table->string('dataValidade');
            $table->string('spedTipoItem');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
