<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosDeportivos extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha', 'tipo_deporte'];

    // Relación con apuestas: Un evento tiene muchas apuestas
    public function apuestas()
    {
        return $this->hasMany(Apuestas::class, 'evento_deportivo_id');
    }
}
