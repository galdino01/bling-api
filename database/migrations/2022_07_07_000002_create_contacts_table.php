<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('customer_id')->constrained()->onDelete('cascade');

            $table->string('email')->unique();
            $table->string('cell')->nullable();
            $table->string('telephone')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('contacts');
    }
};
