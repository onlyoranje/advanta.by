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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('url');
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('sort')->default(500);
            $table->unsignedBigInteger('size')->nullable();
            $table->string('original_name')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
