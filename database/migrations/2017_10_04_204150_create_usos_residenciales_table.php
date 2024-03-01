<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsosResidencialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usos_residenciales', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('antejardin')->default(false)->nullable();
            $table->boolean('patios')->default(false)->nullable();
            $table->boolean('fachadas')->default(false)->nullable();
            $table->boolean('cubiertas')->default(false)->nullable();
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
        Schema::dropIfExists('usos_residenciales');
    }
}
