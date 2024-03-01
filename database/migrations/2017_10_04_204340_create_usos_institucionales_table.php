<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsosInstitucionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usos_institucionales', function (Blueprint $table) {
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
        Schema::dropIfExists('usos_institucionales');
    }
}
