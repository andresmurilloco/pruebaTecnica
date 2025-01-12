<?php

namespace Tests\Feature;

use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_user()
    {
        $data = [
            'nombre' => 'Andres',
            'correo' => 'andres@example.com',
            'saldo' => 10.15
        ];

        $response = $this->postJson('/api/usuarios', $data);

        $response->assertStatus(201);
        $response->assertJson([
            'nombre' => 'Andres',
            'correo' => 'andres@example.com',
            'saldo' => 10.15
        ]);

        $this->assertDatabaseHas('usuarios', $data);
    }

    public function test_update_user()
{
    $user = Usuarios::factory()->create();

    $data = [
        'nombre' => 'Carlos Gómez',
        'correo' => 'carlos.gomez@example.com',
        'saldo' => 5000
    ];

    $response = $this->putJson("/api/usuarios/{$user->id}", $data);

    $response->assertStatus(200);
    $response->assertJson(['nombre' => 'Carlos Gómez']);
    $this->assertDatabaseHas('usuarios', ['correo' => 'carlos.gomez@example.com']);
}

}
