<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('gtin_code');
            $table->string('gtin_package');
            $table->string('cest');

            $table->string('code');

            $table->string('status');
            $table->string('origin');
            $table->string('description');
            $table->string('type');
            $table->string('brand');
            $table->string('price');
            $table->string('price_cost');
            $table->string('warranty')->nullable();
            $table->string('free_shipping')->nullable();
            $table->string('notes')->nullable();

            $table->string('unit_of_measure');
            $table->string('width');
            $table->string('height');
            $table->string('depth');
            $table->string('net_weight');
            $table->string('gross_weight');

            $table->string('quantity');
            $table->string('items_per_box');
            $table->string('boxes');
            $table->string('localization');

            $table->string('image_thumbnail')->nullable();
            $table->string('url_video')->nullable();

            $table->timestamp('expiration_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('products');
    }
};
