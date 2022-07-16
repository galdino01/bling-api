<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('status')->default('active');
            $table->string('origin');
            $table->string('description');
            $table->string('brand');
            $table->string('price');
            $table->string('price_cost');
            $table->string('warranty')->nullable();
            $table->string('notes')->nullable();

            $table->string('unit_of_measure');
            $table->string('width');
            $table->string('height');
            $table->string('depth');
            $table->string('net_weight');
            $table->string('gross_weight');

            $table->string('quantity');
            $table->string('localization');

            $table->string('images')->nullable();

            $table->timestamp('expiration_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('products');
    }
};
