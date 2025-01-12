<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuariosFactory extends Factory
{
    protected $model = \App\Models\Usuarios::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'correo' => $this->faker->unique()->safeEmail,
            'saldo' => $this->faker->randomFloat(2, 10, 1000), // Saldo entre 10 y 1000
        ];
    }
}
