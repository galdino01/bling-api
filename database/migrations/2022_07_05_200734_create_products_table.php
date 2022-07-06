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
            $table->id();

            $table->string('idFabricante')->nullable();
            $table->string('idGrupoProduto')->nullable();
            $table->unsignedBigInteger('idCategoria')->nullable();
            $table->foreign('idCategoria')->references('id')->on('categories')->onDelete('cascade');

            $table->string('key')->nullable();
            $table->string('codigo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('tipo')->nullable();
            $table->string('situacao')->nullable();
            $table->string('unidade')->nullable();
            $table->string('preco')->nullable();
            $table->string('precoCusto')->nullable();
            $table->string('descricaoCurta')->nullable();
            $table->string('descricaoComplementar')->nullable();
            $table->string('dataInclusao')->nullable();
            $table->string('dataAlteracao')->nullable();
            $table->string('imageThumbnail')->nullable();
            $table->string('urlVideo')->nullable();
            $table->string('nomeFornecedor')->nullable();
            $table->string('codigoFabricante')->nullable();
            $table->string('marca')->nullable();
            $table->string('class_fiscal')->nullable();
            $table->string('cest')->nullable();
            $table->string('origem')->nullable();
            $table->string('linkExterno')->nullable();
            $table->string('observacoes')->nullable();
            $table->string('grupoProduto')->nullable();
            $table->string('garantia')->nullable();
            $table->string('descricaoFornecedor')->nullable();
            $table->string('pesoLiq')->nullable();
            $table->string('pesoBruto')->nullable();
            $table->string('estoqueMinimo')->nullable();
            $table->string('estoqueMaximo')->nullable();
            $table->string('gtin')->nullable()->nullable();
            $table->string('gtinEmbalagem')->nullable();
            $table->string('larguraProduto')->nullable();
            $table->string('alturaProduto')->nullable();
            $table->string('profundidadeProduto')->nullable();
            $table->string('unidadeMedida')->nullable();
            $table->integer('itensPorCaixa')->nullable();
            $table->integer('volumes')->nullable();
            $table->string('localizacao')->nullable();
            $table->string('crossdocking')->nullable();
            $table->string('condicao')->nullable();
            $table->string('freteGratis')->nullable();
            $table->string('producao')->nullable();
            $table->string('dataValidade')->nullable();
            $table->string('spedTipoItem')->nullable();
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
