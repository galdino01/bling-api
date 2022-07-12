<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('customer_id')->constrained()->onDelete('cascade');

            $table->string('discount')->nullable();
            $table->string('notes')->nullable();
            $table->string('internal_notes')->nullable();
            $table->string('number')->nullable();
            $table->string('order_number')->nullable();
            $table->string('cost_of_freight')->nullable();
            $table->string('other_expenses')->nullable();
            $table->string('total_of_products')->nullable();
            $table->string('total_sale')->nullable();
            $table->string('status')->nullable();

            $table->string('output_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('orders');
    }
};
