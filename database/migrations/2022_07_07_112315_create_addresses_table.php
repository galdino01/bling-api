<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->string('street')->nullable();
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
        Schema::dropIfExists('addresses');
    }
};
