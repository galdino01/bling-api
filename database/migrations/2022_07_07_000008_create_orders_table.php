<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('customer_id')->constrained()->onDelete('cascade');

            $table->string('number');

            $table->string('status');
            $table->string('discount')->nullable();
            $table->string('cost_of_freight')->nullable();
            $table->string('other_expenses');
            $table->string('total_of_products');
            $table->string('total_sale');
            $table->string('notes')->nullable();

            $table->string('output_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('orders');
    }
};
