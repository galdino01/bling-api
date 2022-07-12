<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->string('manufacturer_id')->nullable();
            $table->string('product_group_id')->nullable();
            $table->string('provider_id')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('brand')->nullable();
            $table->string('unity')->nullable();
            $table->string('price')->nullable();
            $table->string('price_cost')->nullable();
            $table->string('short_description')->nullable();
            $table->string('supp_description')->nullable();
            $table->string('tax_class')->nullable();
            $table->string('cest')->nullable();
            $table->string('origin')->nullable();
            $table->string('external_link')->nullable();
            $table->string('notes')->nullable();
            $table->string('warranty')->nullable();
            $table->string('net_weight')->nullable();
            $table->string('gross_weight')->nullable();
            $table->string('min_stock')->nullable();
            $table->string('max_stock')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('depth')->nullable();
            $table->string('unit_of_measure')->nullable();
            $table->integer('items_per_box')->nullable();
            $table->integer('volumes')->nullable();
            $table->string('localization')->nullable();
            $table->string('cross_docking')->nullable();
            $table->string('free_shipping')->nullable();
            $table->string('production')->nullable();
            $table->string('sped_item_type')->nullable();

            $table->string('image_thumbnail')->nullable();
            $table->string('url_video')->nullable();

            $table->string('gtin_code')->nullable()->nullable();
            $table->string('gtin_package')->nullable();

            $table->string('inclusion_date')->nullable();
            $table->string('expiration_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('products');
    }
};
