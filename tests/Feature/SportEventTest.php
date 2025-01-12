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

    public function testGetAllSportsEventsWithTotalBet()
{
    // Realiza una solicitud GET al endpoint que devuelve los eventos deportivos con el total apostado
    $response = $this->getJson('/api/eventos'); // Cambia la URL según sea necesario

    // Asegúrate de que la solicitud fue exitosa
    $response->assertStatus(200);
    $response->getContent();  // Muestra el contenido completo de la respuesta.


    // Verifica que la respuesta contenga los datos esperados
    $response->assertJsonStructure([
        '*' => [
            'id',
            'nombre',
            'fecha',
            'tipo_deporte',
            'total_apostado',
            'apuestas' => [
                '*' => [
                    'id',
                    'usuario_id',
                    'monto_apostado',
                    'cuota',
                    'estado',
                ],
            ],
        ],
    ]);

    // Verifica que el total apostado sea un valor numérico
    $response->assertJsonFragment(['total_apostado' =>0]); // Puedes ajustar según lo esperado
    $response->assertJsonFragment(['total_apostado' => 0]); // También puedes verificar que el total apostado es cero cuando no hay apuestas
}


}
