<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApuestasTable extends Migration
{
    public function up()
    {
        Schema::create('apuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('evento_deportivo_id')->constrained('eventos_deportivos')->onDelete('cascade');
            $table->decimal('monto_apostado', 10, 2);
            $table->decimal('cuota', 5, 2);
            $table->enum('estado', ['pendiente', 'ganada', 'perdida']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apuestas');
    }
}
