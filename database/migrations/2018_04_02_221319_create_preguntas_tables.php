<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('propietario_id');
            $table->string('titulo');
            $table->string('texto');
            $table->string('respuestas');
            $table->timestamps();
        });
        Schema::table('preguntas', function (Blueprint $table) {
            $table->foreign('propietario_id')
                ->references('id')->on('propietarios')
                ->onDelete('cascade');
        });
        Schema::table('lanzamientos', function (Blueprint $table) {
            //Foreign keys
            $table->foreign('pregunta_id')
                ->references('id')->on('preguntas')
                ->onDelete('cascade');
        });
        Schema::table('respuestas', function (Blueprint $table) {
            $table->foreign('pregunta_id')
                ->references('id')->on('preguntas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
