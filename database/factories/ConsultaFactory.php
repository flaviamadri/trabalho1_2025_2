<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'paciente_id' => \App\Models\Paciente::factory(),
            'medico_id' => \App\Models\Medico::factory(),
            'data_consulta' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'descricao' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['agendada', 'concluida', 'cancelada']),
        ];
    }
}
