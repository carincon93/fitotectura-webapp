<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frutos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('fruto_enero')->default(false)->nullable();
            $table->boolean('fruto_febrero')->default(false)->nullable();
            $table->boolean('fruto_marzo')->default(false)->nullable();
            $table->boolean('fruto_abril')->default(false)->nullable();
            $table->boolean('fruto_mayo')->default(false)->nullable();
            $table->boolean('fruto_junio')->default(false)->nullable();
            $table->boolean('fruto_julio')->default(false)->nullable();
            $table->boolean('fruto_agosto')->default(false)->nullable();
            $table->boolean('fruto_septiembre')->default(false)->nullable();
            $table->boolean('fruto_octubre')->default(false)->nullable();
            $table->boolean('fruto_noviembre')->default(false)->nullable();
            $table->boolean('fruto_diciembre')->default(false)->nullable();
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
        Schema::dropIfExists('frutos');
    }
}
