<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apuestas extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'evento_deportivo_id',
        'monto_apostado',
        'cuota',
        'estado',
    ];

    // Relación inversa: cada apuesta pertenece a un evento deportivo
    public function eventoDeportivo()
    {
        return $this->belongsTo(EventosDeportivos::class, 'evento_deportivo_id');
    }
}
