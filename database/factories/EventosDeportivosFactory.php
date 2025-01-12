<?php

namespace Database\Factories;

use App\Models\EventosDeportivos;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventosDeportivosFactory extends Factory
{
    protected $model = EventosDeportivos::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'fecha' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'tipo_deporte' => $this->faker->randomElement(['Fútbol', 'Béisbol', 'Baloncesto', 'Tenis']),
        ];
    }
}
