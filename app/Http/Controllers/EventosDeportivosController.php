<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EventosDeportivosService;

class EventosDeportivosController extends Controller
{
    protected $eventosService;

    public function __construct(EventosDeportivosService $eventosService)
    {
        $this->eventosService = $eventosService;
    }

    public function create(Request $request)
{
    // Verifica si la solicitud llega correctamente
    dd($request->all());

    $data = $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha' => 'required|date',
        'tipo_deporte' => 'required|string|max:255',
    ]);

    // Verifica los datos validados antes de continuar
    dd($data);

    $event = $this->eventosService->createEvent($data);

    // Verifica el evento creado antes de la respuesta
    dd($event);

    return response()->json($event, 201);
}


    public function getAll()
{
    $events = $this->eventosService->getAllEvents();

    // Añadir el total apostado y las apuestas asociadas a cada evento
    $eventsWithBets = $events->map(function ($event) {
        $event->total_apostado = $this->eventosService->getTotalBetByEvent($event->id);
        $event->apuestas = $event->apuestas; // Asumiendo que tienes una relación de apuestas en el modelo EventosDeportivos
        return $event;
    });

    return response()->json($eventsWithBets);
}

}
