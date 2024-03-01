<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('poda_de_formacion')->default(false)->nullable();
            $table->boolean('poda_de_ramas_bajas')->default(false)->nullable();
            $table->boolean('poda_estructurada_o_estetica')->default(false)->nullable();
            $table->boolean('poda_de_estabilidad')->default(false)->nullable();
            $table->longText('observaciones')->nullable();
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
        Schema::dropIfExists('mantenimientos');
    }
}
