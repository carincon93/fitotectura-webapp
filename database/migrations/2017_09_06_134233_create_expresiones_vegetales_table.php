<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpresionesVegetalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expresiones_vegetales', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('raiz')->default(false)->nullable();
            $table->boolean('tronco')->default(false)->nullable();
            $table->boolean('corteza')->default(false)->nullable();
            $table->boolean('ramas')->default(false)->nullable();
            $table->boolean('hojas')->default(false)->nullable();
            $table->boolean('flores')->default(false)->nullable();
            $table->boolean('frutos')->default(false)->nullable();
            $table->boolean('formas')->default(false)->nullable();
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
        Schema::dropIfExists('expresiones_vegetales');
    }
}
