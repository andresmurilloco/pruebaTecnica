<?php

namespace Database\Factories;

use App\Models\Apuestas;
use App\Models\Usuarios;
use App\Models\EventosDeportivos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApuestasFactory extends Factory
{
    protected $model = Apuestas::class;

    public function definition()
    {
        return [
            'usuario_id' => Usuarios::factory(),
            'evento_deportivo_id' => EventosDeportivos::factory(),
            'monto_apostado' => $this->faker->randomFloat(2, 10, 1000),
            'cuota' => $this->faker->randomFloat(2, 1.1, 5.0),
            'estado' => $this->faker->randomElement(['pendiente', 'ganada', 'perdida']),
        ];
    }
}
