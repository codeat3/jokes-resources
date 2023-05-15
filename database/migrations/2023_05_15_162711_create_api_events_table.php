<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('api_events', function (Blueprint $table) {
            $table->id();

            $table->ulid('category_id');
            $table->ulid('joke_id');
            $table->ulid('source_id');

            $table->string('browser');
            $table->string('browser_version');
            $table->string('device');
            $table->string('platform');
            $table->string('platform_version');
            $table->string('is_robot');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_events');
    }
};
