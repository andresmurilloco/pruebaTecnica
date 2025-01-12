<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosDeportivosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos_deportivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->dateTime('fecha');
            $table->string('tipo_deporte');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos_deportivos');
    }
}
