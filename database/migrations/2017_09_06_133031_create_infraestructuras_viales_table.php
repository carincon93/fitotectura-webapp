<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfraestructurasVialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infraestructuras_viales', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('separador_de_avenidas')->default(false)->nullable();
            $table->boolean('glorietas_rotondas')->default(false)->nullable();
            $table->boolean('andenes')->default(false)->nullable();
            $table->boolean('puentes')->default(false)->nullable();
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
        Schema::dropIfExists('infraestructuras_viales');
    }
}
