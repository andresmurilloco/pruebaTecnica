<?php

namespace App\Repositories;

use App\Models\EventosDeportivos;

class EventosDeportivosRepository
{
    public function create(array $data)
    {
        return EventosDeportivos::create($data);
    }

    public function getAll()
    {
        return EventosDeportivos::all();
    }

    public function getById($id)
    {
        return EventosDeportivos::find($id);
    }

    public function getTotalApostado($eventId)
{
    return EventosDeportivos::find($eventId)->apuestas()->sum('monto_apostado');
}

}
