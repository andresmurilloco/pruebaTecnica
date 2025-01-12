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
        try {
            return $this->eventosRepo->create($data);
        } catch (\Exception $e) {
            throw new \Exception('Error al crear el evento: ' . $e->getMessage());
        }
    }

    public function getAllEvents()
    {
        try {
            return $this->eventosRepo->getAll();
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener los eventos: ' . $e->getMessage());
        }
    }

    public function getEventById($id)
    {
        try {
            $event = $this->eventosRepo->getById($id);
            if (!$event) {
                throw new \Exception("El evento con ID $id no existe.");
            }
            return $event;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener el evento: ' . $e->getMessage());
        }
    }

    public function getTotalBetByEvent($eventId)
    {
        try {
            $evento = $this->eventosRepo->getById($eventId);
            if (!$evento) {
                throw new \Exception("El evento con ID $eventId no existe.");
            }
            return $this->eventosRepo->getTotalApostado($eventId);
        } catch (\Exception $e) {
            throw new \Exception('Error al calcular el total apostado: ' . $e->getMessage());
        }
    }
}
