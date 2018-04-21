<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanzamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lanzamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pregunta_id');
            $table->unsignedInteger('propietario_id');
            $table->unsignedInteger('duracion');//int segundos visible
            $table->boolean('finalizada');//booleano de finalización
            $table->boolean('abortada');//booleano de cancelación
            $table->timestamp('momento_activacion');//timestamp del momento de comienzo
            $table->timestamps();

        });
        Schema::table('lanzamientos', function (Blueprint $table) {
            //Foreign keys


            $table->foreign('propietario_id')
                ->references('id')->on('propietarios')
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
        Schema::dropIfExists('lanzamientos');
    }
}
