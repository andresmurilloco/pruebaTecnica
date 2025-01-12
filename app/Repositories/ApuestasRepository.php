<?php

namespace App\Repositories;

use App\Models\Apuestas;

class ApuestasRepository
{
    public function create(array $data)
    {
        return Apuestas::create($data);
    }

    public function updateState($id, $state)
{
    $apuesta = Apuestas::find($id);
    if ($apuesta) {
        $apuesta->update(['estado' => $state]);
    }
    return $apuesta;
}


    public function getByUser($userId, $state = null)
    {
        return Apuestas::where('usuario_id', $userId)
                       ->when($state, function ($query) use ($state) {
                           return $query->where('estado', $state);
                       })
                       ->get();
    }

    public function getTotalApostadoByEvent($eventId)
    {
        return Apuestas::where('evento_deportivo_id', $eventId)
                       ->sum('monto_apostado');
    }
}
