<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('cep')->nullable();
            $table->string('street');
            $table->string('number');
            $table->string('adjunct');
            $table->string('district');
            $table->string('city');
            $table->string('state');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('addresses');
    }
};