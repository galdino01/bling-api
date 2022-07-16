<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->unique();

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('status');
            $table->string('discount')->nullable();
            $table->string('cost_of_freight')->nullable();
            $table->string('other_expenses')->nullable();
            $table->string('total_of_products');
            $table->string('total_sale');
            $table->string('notes')->nullable();

            $table->timestamp('output_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('orders');
    }
};
