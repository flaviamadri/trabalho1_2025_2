<?php

namespace Database\Seeders;

use App\Models\Consulta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consulta::factory()->count(20)->create();
    }
}
