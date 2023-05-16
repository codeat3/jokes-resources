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
        Schema::create('sources', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('title')->unique();
            $table->string('endpoint')->nullable();

            $table->timestamps();
        });

        Schema::create('joke_source', function (Blueprint $table) {
            $table->ulid('joke_id');
            $table->ulid('source_id');

            $table->string('source_orig_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sources');
    }
};
