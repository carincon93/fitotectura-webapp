<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsoDeServiciosPublicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uso_de_servicios_publicos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('antejardin')->default(false)->nullable();
            $table->boolean('fachadas')->default(false)->nullable();
            $table->boolean('cubiertas')->default(false)->nullable();
            $table->boolean('plazoletas_acceso')->default(false)->nullable();
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
        Schema::dropIfExists('uso_de_servicios_publicos');
    }
}
