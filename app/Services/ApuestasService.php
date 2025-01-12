<?php

namespace App\Services;

use App\Repositories\ApuestasRepository;

class ApuestasService
{
    protected $apuestasRepo;

    public function __construct(ApuestasRepository $apuestasRepo)
    {
        $this->apuestasRepo = $apuestasRepo;
    }

    public function createBet(array $data)
    {
        return $this->apuestasRepo->create($data);
    }

    public function updateBetState($id, $state)
{
    return $this->apuestasRepo->updateState($id, $state);
}


    public function getBetsByUser($userId, $state = null)
    {
        return $this->apuestasRepo->getByUser($userId, $state);
    }

    public function getTotalBetByEvent($eventId)
    {
        return $this->apuestasRepo->getTotalApostadoByEvent($eventId);
    }
}
