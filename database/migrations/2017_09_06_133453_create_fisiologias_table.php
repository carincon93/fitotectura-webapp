<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFisiologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fisiologias', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('crecimiento')->default(false)->nullable();
            $table->boolean('rapido')->default(false)->nullable();
            $table->boolean('medio')->default(false)->nullable();
            $table->boolean('lento')->default(false)->nullable();
            $table->boolean('longevidad')->default(false)->nullable();
            $table->boolean('alta')->default(false)->nullable();
            $table->boolean('media')->default(false)->nullable();
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
        Schema::dropIfExists('fisiologias');
    }
}
