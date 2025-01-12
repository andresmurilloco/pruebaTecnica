<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApuestasService;

class ApuestasController extends Controller
{
    protected $apuestasService;

    public function __construct(ApuestasService $apuestasService)
    {
        $this->apuestasService = $apuestasService;
    }

    public function create(Request $request)
{
    $data = $request->validate([
        'usuario_id' => 'required|exists:usuarios,id',
        'evento_deportivo_id' => 'required|exists:eventos_deportivos,id',
        'monto_apostado' => 'required|numeric',
        'cuota' => 'required|numeric',
        'estado' => 'required|string',
    ]);
    $bet = $this->apuestasService->createBet($data);
    return response()->json($bet, 201);
}


public function updateState($id, Request $request)
{
    $state = $request->validate([
        'estado' => 'required|string|in:ganada,perdida',
    ]);
    $bet = $this->apuestasService->updateBetState($id, $state['estado']);
    return response()->json($bet);
}


    public function getByUser($userId, Request $request)
{
    $state = $request->query('estado'); // Este parámetro puede ser opcional
    $bets = $this->apuestasService->getBetsByUser($userId, $state);
    return response()->json($bets);
}

    public function getTotalByEvent($eventId)
    {
        $total = $this->apuestasService->getTotalBetByEvent($eventId);
        return response()->json(['total' => $total]);
    }
}
