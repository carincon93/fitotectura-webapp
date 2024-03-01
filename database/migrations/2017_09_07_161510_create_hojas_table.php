<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hojas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('hoja_enero')->default(false)->nullable();
            $table->boolean('hoja_febrero')->default(false)->nullable();
            $table->boolean('hoja_marzo')->default(false)->nullable();
            $table->boolean('hoja_abril')->default(false)->nullable();
            $table->boolean('hoja_mayo')->default(false)->nullable();
            $table->boolean('hoja_junio')->default(false)->nullable();
            $table->boolean('hoja_julio')->default(false)->nullable();
            $table->boolean('hoja_agosto')->default(false)->nullable();
            $table->boolean('hoja_septiembre')->default(false)->nullable();
            $table->boolean('hoja_octubre')->default(false)->nullable();
            $table->boolean('hoja_noviembre')->default(false)->nullable();
            $table->boolean('hoja_diciembre')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hojas');
    }
}
