<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspaciosPublicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacios_publicos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('parques')->default(false)->nullable();
            $table->boolean('plazoletas')->default(false)->nullable();
            $table->boolean('jardines')->default(false)->nullable();
            $table->boolean('instalaciones_deportivas')->default(false)->nullable();
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
        Schema::dropIfExists('espacios_publicos');
    }
}
