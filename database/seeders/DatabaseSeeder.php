<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\StatusConsulta;
use App\Models\TipoSanguineo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatusConsultaSeeder::class,
            EspecialidadeMedicoSeeder::class,
            TipoSanguineoSeeder::class,
            MedicoSeeder::class,
            PacienteSeeder::class,
            ConsultaSeeder::class,

        ]);


    }
}
