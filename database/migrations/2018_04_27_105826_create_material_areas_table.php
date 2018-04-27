<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('area_id');
            $table->unsignedBigInteger('material_id');
            $table->foreign('area_id')
				  ->references('id')
                  ->on('areas');
            $table->foreign('material_id')
				  ->references('id')
				  ->on('materials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_areas');
    }
}
