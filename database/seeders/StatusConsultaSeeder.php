<?php

namespace Database\Seeders;

use App\Models\StatusConsulta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusConsulta::factory()->count(3)->create();
    }
}
