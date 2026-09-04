<?php

namespace Database\Factories;

use App\Models\Modalidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModalidadeFactory extends Factory
{
    protected $model = Modalidade::class;

    public function definition(): array
    {
        return [
            'nome_modalidade' => fake()->randomElement(['Musculação', 'Crossfit', 'Pilates', 'Natação', 'Spinning', 'Boxe']),
            'descricao' => fake()->sentence(8),
            'valor_mensal' => fake()->randomFloat(2, 80, 250),
        ];
    }
}
