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

            Schema::create('parameter_rubrics', function (Blueprint $table) {
                //$table->id();

                $table->unsignedBigInteger('rubrics_id');
                $table->unsignedBigInteger('parameter_id');
                $table->foreign('rubrics_id')->references('id')->on('rubrics')->cascadeOnDelete();
                $table->foreign('parameter_id')->references('id')->on('parameters')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameter_rubrics');
    }
};
