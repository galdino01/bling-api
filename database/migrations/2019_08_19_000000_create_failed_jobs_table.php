<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->default(Str::uuid()->toString());

            $table->string('uuid')->unique();

            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');

            $table->timestamp('failed_at')->useCurrent();
        });
    }

    public function down() {
        Schema::dropIfExists('failed_jobs');
    }
};
