<?php

namespace Database\Factories;

use App\Models\TipoSanguineo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
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
            'nascimento' => $this->faker->date(),
            'tiposanguineo_paciente_id' => (TipoSanguineo::All()->random())->id,
            'telefone' => $this->faker->phoneNumber(),
            'endereco' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'imagem' => null,
        ];
    }
}
