<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->string('nome')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('ie')->nullable();
            $table->string('rg')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('uf')->nullable();
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->string('fone')->nullable();
        });
    }

    public function down() {
        Schema::dropIfExists('customers');
    }
};
