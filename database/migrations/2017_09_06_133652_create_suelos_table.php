<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suelos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('naturaleza')->default(false)->nullable();
            $table->boolean('acido')->default(false)->nullable();
            $table->boolean('medio')->default(false)->nullable();
            $table->boolean('medio_acido')->default(false)->nullable();
            $table->boolean('textura')->default(false)->nullable();
            $table->boolean('franco')->default(false)->nullable();
            $table->boolean('arenoso')->default(false)->nullable();
            $table->boolean('arcilloso')->default(false)->nullable();
            $table->boolean('materia_organica')->default(false)->nullable();
            $table->boolean('rico')->default(false)->nullable();
            $table->boolean('medio_mt')->default(false)->nullable();
            $table->boolean('pobre')->default(false)->nullable();
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
        Schema::dropIfExists('suelos');
    }
}
