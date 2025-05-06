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
        Schema::create('product_parameters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parameter_id')->onDelete('cascade');
            $table->foreign('parameter_id')->references('id')->on('parameters');
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->string('value')->nullable();
            $table->timestamps();
            $table->unique(['parameter_id', 'products_id'],'parameter_product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_parameters');
    }
};
