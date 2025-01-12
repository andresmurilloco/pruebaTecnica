<?php

namespace App\Services;

use App\Repositories\EventosDeportivosRepository;

class EventosDeportivosService
{
    protected $eventosRepo;

    public function __construct(EventosDeportivosRepository $eventosRepo)
    {
        $this->eventosRepo = $eventosRepo;
    }

    public function createEvent(array $data)
    {
        return $this->eventosRepo->create($data);
    }

    public function getAllEvents()
    {
        return $this->eventosRepo->getAll();
    }

    public function getEventById($id)
    {
        return $this->eventosRepo->getById($id);
    }

    public function getTotalBetByEvent($eventId)
{
    return $this->eventosRepo->getTotalApostado($eventId);
}

}
