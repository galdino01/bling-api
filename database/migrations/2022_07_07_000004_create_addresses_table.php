<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->default(Str::uuid()->toString());

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
