<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApuestasRelationshipToEventosDeportivos extends Migration
{
    public function up()
    {
        // Agregar la relación en eventos_deportivos
        Schema::table('eventos_deportivos', function (Blueprint $table) {
            // No es necesario agregar columna en eventos_deportivos ya que la relación se maneja en la tabla apuestas.
        });
        
        // La relación se maneja en la tabla apuestas, y ya la has configurado correctamente allí.
    }

    public function down()
    {
        // Si necesitas revertir esta migración
        Schema::table('eventos_deportivos', function (Blueprint $table) {
            // Eliminar las relaciones si es necesario.
        });
    }
}
