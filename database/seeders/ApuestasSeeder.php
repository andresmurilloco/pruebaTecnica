<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apuestas;

class ApuestasSeeder extends Seeder
{
    public function run()
    {
        Apuestas::factory(10)->create(); // Genera 10 apuestas
    }
}
