<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('sellers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            $table->string('name')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('sellers');
    }
};