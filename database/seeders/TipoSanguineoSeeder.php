<?php

namespace Database\Seeders;

use App\Models\TipoSanguineo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSanguineoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoSanguineo::factory()->count(8)->create();
    }
}
