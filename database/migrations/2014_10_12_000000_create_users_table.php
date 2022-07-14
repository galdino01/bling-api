<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->string('type');

            $table->string('name');
            $table->string('ie');

            $table->string('cnpj');
            $table->string('rg');
            $table->string('cpf');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
};
