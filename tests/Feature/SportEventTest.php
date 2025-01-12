<?php

namespace Tests\Feature;

use App\Models\EventosDeportivos;
use App\Models\Apuestas;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SportEventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_an_event()
    {
        // Datos del evento deportivo
        $data = [
            'nombre' => 'Partido de Fútbol',
            'fecha' => '2025-06-15 18:00:00',
            'tipo_deporte' => 'Fútbol',
        ];

        // Enviamos la solicitud para crear el evento
        $response = $this->postJson('/api/eventos', $data);

        // Verificamos el código de estado y la respuesta JSON
        $response->assertStatus(201);
        $response->assertJson([
            'nombre' => 'Partido de Fútbol',
            'fecha' => '2025-06-15 18:00:00',
            'tipo_deporte' => 'Fútbol',
        ]);

        // Verificamos que el evento esté en la base de datos
        $this->assertDatabaseHas('eventos_deportivos', $data);
    }
}
