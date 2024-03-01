<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrevencionDeRiesgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prevencion_de_riesgos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('barrera_visual')->default(false)->nullable();
            $table->boolean('barrera_acustica')->default(false)->nullable();
            $table->boolean('barrera_de_olores')->default(false)->nullable();
            $table->boolean('barrera_de_vientos')->default(false)->nullable();
            $table->boolean('cubrir_taludes')->default(false)->nullable();
            $table->boolean('ronda_hidrica')->default(false)->nullable();
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
        Schema::dropIfExists('prevencion_de_riesgos');
    }
}
