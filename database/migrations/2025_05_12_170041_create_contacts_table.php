<?php

use App\Models\Contacts;
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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('coordinates')->nullable();
            $table->string('phones')->nullable();
            $table->string('email')->nullable();
            $table->string('UNP')->nullable();
            $table->string('bank')->nullable();
            $table->timestamps();
        });
        Contacts::create(['company_name'=>'Общество с ограниченной ответственностью «Адванта Технолоджи»','address'=>'Республика Беларусь, г. Брест, Красногвардейская улица, 114Б/5','coordinates'=>'52.126845,23.695958','email'=>'advanta_system@mail.ru','UNP'=>'291859037', 'bank'=>'р/с BY50POIS30120164918001933001 код POISBY2X, ОАО «Паритетбанк»']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
