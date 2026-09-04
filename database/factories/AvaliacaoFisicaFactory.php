<?php

namespace Database\Factories;

use App\Models\AvaliacaoFisica;
use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvaliacaoFisicaFactory extends Factory
{
    protected $model = AvaliacaoFisica::class;

    public function definition(): array
    {
        return [
            'aluno_id' => Aluno::factory(),
            'peso' => fake()->randomFloat(2, 50, 110),
            'altura' => fake()->randomFloat(2, 1.50, 2.00),
            'objetivo_treino' => fake()->randomElement(['Hipertrofia', 'Emagrecimento', 'Condicionamento Físico', 'Reabilitação']),
        ];
    }
}
