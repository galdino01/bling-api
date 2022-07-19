<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->default(Str::uuid()->toString());

            $table->morphs('tokenable');
            $table->string('token', 64)->unique();

            $table->string('name');
            $table->text('abilities')->nullable();

            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('personal_access_tokens');
    }
};
