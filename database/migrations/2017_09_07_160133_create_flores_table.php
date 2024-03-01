<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flores', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('flor_enero')->default(false)->nullable();
            $table->boolean('flor_febrero')->default(false)->nullable();
            $table->boolean('flor_marzo')->default(false)->nullable();
            $table->boolean('flor_abril')->default(false)->nullable();
            $table->boolean('flor_mayo')->default(false)->nullable();
            $table->boolean('flor_junio')->default(false)->nullable();
            $table->boolean('flor_julio')->default(false)->nullable();
            $table->boolean('flor_agosto')->default(false)->nullable();
            $table->boolean('flor_septiembre')->default(false)->nullable();
            $table->boolean('flor_octubre')->default(false)->nullable();
            $table->boolean('flor_noviembre')->default(false)->nullable();
            $table->boolean('flor_diciembre')->default(false)->nullable();
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
        Schema::dropIfExists('flores');
    }
}
