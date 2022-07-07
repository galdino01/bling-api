<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->unsignedBigInteger('idCliente');
            $table->foreign('idCliente')->references('id')->on('customers')->onDelete('cascade');

            $table->string('desconto')->nullable();
            $table->string('observacoes')->nullable();
            $table->string('observacaoInterna')->nullable();
            $table->string('numero')->nullable();
            $table->string('numeroOrdemCompra')->nullable();
            $table->string('vendedor')->nullable();
            $table->string('valorFrete')->nullable();
            $table->string('outrasDespesas')->nullable();
            $table->string('totalprodutos')->nullable();
            $table->string('totalvenda')->nullable();
            $table->string('situacao')->nullable();
            $table->string('data')->nullable();
            $table->string('dataSaida')->nullable();
        });
    }

    public function down() {
        Schema::dropIfExists('orders');
    }
};
