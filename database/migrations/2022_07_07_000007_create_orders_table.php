<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->default(Str::uuid()->toString());

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('status')->default('active');
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
