<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        Usuarios::factory(10)->create(); // Genera 10 usuarios de prueba
    }
}
