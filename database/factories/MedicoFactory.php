<?php

namespace Database\Factories;

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

            'nome' => $this->faker->name(),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'crm' => $this->faker->unique()->numerify('##########'),
            'especialidade' => $this->faker->randomElement(['Cardiologia', 'Dermatologia', 'Neurologia', 'Pediatria', 'Ortopedia']),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
