<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTecnicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_tecnicas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('ficha_tecnica');
            $table->string('nombre');
            $table->string('nombre_cientifico');
            $table->string('familia');
            $table->string('origen');
            $table->string('propagacion');
            $table->string('altitud_siembra');
            $table->longText('descripcion');
            $table->string('foto');
            $table->string('detalle_especie')->nullable();
            $table->string('detalle_hoja')->nullable();
            $table->string('detalle_tronco')->nullable();
            $table->string('detalle_fruto')->nullable();
            $table->string('caracteristica');
            $table->integer('expresion_vegetal_id')->unsigned()->nullable();
            $table->integer('mantenimiento_id')->unsigned()->nullable();
            $table->integer('climatologia_id')->unsigned()->nullable();
            $table->integer('suelo_id')->unsigned()->nullable();
            $table->integer('fisiologia_id')->unsigned()->nullable();
            $table->integer('prevencion_de_riesgo_id')->unsigned()->nullable();
            $table->integer('infraestructura_vial_id')->unsigned()->nullable();
            $table->integer('espacio_publico_id')->unsigned()->nullable();
            $table->integer('flor_id')->unsigned()->nullable();
            $table->integer('hoja_id')->unsigned()->nullable();
            $table->integer('fruto_id')->unsigned()->nullable();
            $table->integer('uso_residencial_id')->unsigned()->nullable();
            $table->integer('uso_institucional_id')->unsigned()->nullable();
            $table->integer('uso_de_servicios_publicos_id')->unsigned()->nullable();
            $table->integer('uso_comercial_id')->unsigned()->nullable();
            $table->foreign('expresion_vegetal_id')->references('id')->on('expresiones_vegetales')->onDelete('cascade');
            $table->foreign('mantenimiento_id')->references('id')->on('mantenimientos')->onDelete('cascade');
            $table->foreign('climatologia_id')->references('id')->on('climatologias')->onDelete('cascade');
            $table->foreign('suelo_id')->references('id')->on('suelos')->onDelete('cascade');
            $table->foreign('fisiologia_id')->references('id')->on('fisiologias')->onDelete('cascade');
            $table->foreign('prevencion_de_riesgo_id')->references('id')->on('prevencion_de_riesgos')->onDelete('cascade');
            $table->foreign('infraestructura_vial_id')->references('id')->on('infraestructuras_viales')->onDelete('cascade');
            $table->foreign('espacio_publico_id')->references('id')->on('espacios_publicos')->onDelete('cascade');
            $table->foreign('flor_id')->references('id')->on('flores')->onDelete('cascade');
            $table->foreign('hoja_id')->references('id')->on('hojas')->onDelete('cascade');
            $table->foreign('fruto_id')->references('id')->on('frutos')->onDelete('cascade');
            $table->foreign('uso_residencial_id')->references('id')->on('usos_residenciales')->onDelete('cascade');
            $table->foreign('uso_institucional_id')->references('id')->on('usos_institucionales')->onDelete('cascade');
            $table->foreign('uso_de_servicios_publicos_id')->references('id')->on('uso_de_servicios_publicos')->onDelete('cascade');
            $table->foreign('uso_comercial_id')->references('id')->on('usos_comerciales')->onDelete('cascade');

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
        Schema::dropIfExists('fichas_tecnicas');
    }
}
