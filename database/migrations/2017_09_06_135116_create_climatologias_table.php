<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimatologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climatologias', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('ambiente')->default(false)->nullable();
            $table->boolean('humedo_tropical')->default(false)->nullable();
            $table->boolean('seco_tropical')->default(false)->nullable();
            $table->boolean('selva_premontana')->default(false)->nullable();
            $table->boolean('clima')->default(false)->nullable();
            $table->boolean('frio')->default(false)->nullable();
            $table->boolean('templado')->default(false)->nullable();
            $table->boolean('calido')->default(false)->nullable();
            $table->boolean('viento')->default(false)->nullable();
            $table->boolean('alto')->default(false)->nullable();
            $table->boolean('medio')->default(false)->nullable();
            $table->boolean('baja')->default(false)->nullable();
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
        Schema::dropIfExists('climatologias');
    }
}
