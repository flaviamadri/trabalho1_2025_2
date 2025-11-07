<?php

namespace Database\Factories;

use App\Models\EspecialidadeMedico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imagem' => null,
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'crm' => $this->faker->unique()->numerify('##########'),
            'especialidade_medico_id' => (EspecialidadeMedico::All()->random())->id,
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),

        ];
    }
}
