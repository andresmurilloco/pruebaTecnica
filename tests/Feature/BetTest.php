<?php

namespace Tests\Feature;

use App\Models\Usuarios;
use App\Models\Apuestas;
use App\Models\EventosDeportivos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_bet()
    {
        // Creamos un usuario y un evento deportivo
        $user = Usuarios::factory()->create();
        $evento = EventosDeportivos::factory()->create();

        // Datos de la apuesta
        $data = [
            'usuario_id' => $user->id,
            'evento_deportivo_id' => $evento->id,
            'monto_apostado' => 1000,
            'cuota' => 2.5,
            'estado' => 'pendiente',
        ];

        // Enviamos la solicitud para crear la apuesta
        $response = $this->postJson('/api/apuestas', $data);

        // Verificamos el código de estado y la respuesta JSON
        $response->assertStatus(201);
        $response->assertJson([
            'usuario_id' => $user->id,
            'evento_deportivo_id' => $evento->id,
            'monto_apostado' => 1000,
            'cuota' => 2.5,
            'estado' => 'pendiente',
        ]);

        // Verificamos que la apuesta esté en la base de datos
        $this->assertDatabaseHas('apuestas', $data);
    }

    public function test_update_bet_state()
{
    $user = Usuarios::factory()->create();
    $event = EventosDeportivos::factory()->create();

    $bet = Apuestas::factory()->create([
        'usuario_id' => $user->id,
        'evento_deportivo_id' => $event->id,
        'estado' => 'pendiente'
    ]);

    $response = $this->putJson("/api/apuestas/{$bet->id}", ['estado' => 'ganada']);

    $response->assertStatus(200);
    $response->assertJson(['estado' => 'ganada']);
    $this->assertDatabaseHas('apuestas', ['estado' => 'ganada']);
}

public function test_get_bets_by_user()
{
    $user = Usuarios::factory()->create();
    $event = EventosDeportivos::factory()->create();

    $bet = Apuestas::factory()->create([
        'usuario_id' => $user->id,
        'evento_deportivo_id' => $event->id,
        'estado' => 'ganada'
    ]);

    $response = $this->getJson("/api/apuestas/usuario/{$user->id}");
    $response->assertStatus(200);
    $response->assertJsonFragment(['estado' => 'ganada']);
}

public function test_get_bets_by_user_with_filter()
{
    $user = Usuarios::factory()->create();
    $event = EventosDeportivos::factory()->create();

    $bet1 = Apuestas::factory()->create([
        'usuario_id' => $user->id,
        'evento_deportivo_id' => $event->id,
        'estado' => 'ganada'
    ]);

    $bet2 = Apuestas::factory()->create([
        'usuario_id' => $user->id,
        'evento_deportivo_id' => $event->id,
        'estado' => 'perdida'
    ]);

    $response = $this->getJson("/api/apuestas/usuario/{$user->id}?estado=ganada");
    $response->assertStatus(200);
    $response->assertJsonFragment(['estado' => 'ganada']);
    $response->assertJsonMissing(['estado' => 'perdida']);
}


}
