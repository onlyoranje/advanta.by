<?php

use App\Models\Rubrics;
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
        Schema::create('rubrics', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('title_r',100)->nullable();
            $table->string('icon')->nullable();
            $table->tinyText('description')->nullable();
            //$table->unsignedBigInteger('parent_id')->nullable();
            //$table->foreign('parent_id')->references('id')->on('rubrics')->onDelete('restrict');
            $table->unsignedBigInteger('sort')->default(500);
            $table->nestedSet();
            $table->unsignedBigInteger('level')->nullable();
            $table->timestamps();
    });
        $id_1 = Rubrics::create(['title' => 'Картриджи механической очистки','sort'=> 100,'level' => 0]);
        $id_2 = Rubrics::create(['title' => 'Картриджи угольные','sort'=> 200,'level' => 0]);
        $id_3 = Rubrics::create(['title' => 'Картриджи умягчающие','sort'=> 300,'level' => 0]);

        $id_4 = Rubrics::create(['title' => 'Картриджи вспененные','parent_id' => $id_1->id,'sort'=> 100,'level' => 1]);
        $id_5 = Rubrics::create(['title' => 'Картриджи веревочные','parent_id' => $id_1->id,'sort'=> 200,'level' => 1]);

}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubrics');
    }
};
