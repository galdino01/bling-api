<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->string('name')->nullable();
            $table->string('rg')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('ie')->nullable();

            $table->string('email')->nullable();
            $table->string('cell')->nullable();
            $table->string('telephone')->nullable();

            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('adjunct')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('cep')->nullable();
            $table->string('uf')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('customers');
    }
};
