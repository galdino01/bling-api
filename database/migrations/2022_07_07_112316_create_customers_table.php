<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('address_id')->constrained()->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('rg')->nullable();
            $table->string('ie')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('customers');
    }
};
