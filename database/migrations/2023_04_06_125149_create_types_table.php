<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('title');
            $table->string('slug')->unique();

            $table->timestamps();
        });

        Schema::create('joke_type', function (Blueprint $table) {
            $table->ulid('type_id');
            $table->ulid('joke_id');

            $table->unique(['type_id', 'joke_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
        Schema::dropIfExists('joke_type');
    }
};
