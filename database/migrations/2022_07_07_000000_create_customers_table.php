<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->string('name');
            $table->string('cnpj');
            $table->string('ie');

            $table->string('rg');
            $table->string('cpf');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('customers');
    }
};
