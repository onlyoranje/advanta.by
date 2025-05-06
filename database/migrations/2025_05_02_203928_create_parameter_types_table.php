<?php

use App\Models\ParameterType;
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
        Schema::create('parameter_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('type_name')->nullable();
            $table->json('properties')->nullable();
            $table->timestamps();
        });
        ParameterType::updateOrCreate(['type'=>'number','type_name'=>"Число"]);
        ParameterType::updateOrCreate(['type'=>'string','type_name'=>"Текст"]);
        ParameterType::updateOrCreate(['type'=>'option','type_name'=>"Опции"]);
        ParameterType::updateOrCreate(['type'=>'checkbox','type_name'=>"Да/Нет"]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameter_types');
    }
};
