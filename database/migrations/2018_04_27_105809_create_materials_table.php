<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('title',350);
            $table->unsignedInteger('language_id');
            $table->unsignedInteger('edition');
            $table->unsignedInteger('year');
            $table->unsignedInteger('material_type_id');
            $table->string('file',300);
            $table->text('abstract');
            $table->string('isbn',20);
            $table->boolean('is_digital')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('language_id')
				  ->references('id')
                  ->on('languages');
            $table->foreign('material_type_id')
				  ->references('id')
                  ->on('material_types');
            $table->foreign('user_id')
				  ->references('id')
				  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
