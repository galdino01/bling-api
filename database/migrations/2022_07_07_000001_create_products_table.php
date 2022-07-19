<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();

            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');

            $table->string('status')->default('active');
            $table->string('origin');
            $table->string('description');
            $table->string('brand');
            $table->string('price');
            $table->string('price_cost');
            $table->string('warranty')->nullable();
            $table->string('notes')->nullable();

            $table->string('width');
            $table->string('height');
            $table->string('depth');
            $table->string('net_weight');
            $table->string('gross_weight');

            $table->string('quantity');
            $table->string('localization');

            $table->string('image')->nullable();

            $table->timestamp('expiration_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('products');
    }
};
