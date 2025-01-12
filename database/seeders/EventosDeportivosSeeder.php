<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // Asegúrate de que esta línea esté presente
use App\Models\EventosDeportivos;

class EventosDeportivosSeeder extends Seeder
{
    public function run()
    {
        EventosDeportivos::factory(10)->create(); // Genera 10 eventos deportivos
    }
}
