<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\AvaliacaoFisica;

class AvaliacaoFisicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = Aluno::take(5)->get();

        foreach ($alunos as $aluno) {
            AvaliacaoFisica::create([
                'aluno_id' => $aluno->id,
                'peso' => fake()->randomFloat(2, 55, 95),
                'altura' => fake()->randomFloat(2, 1.60, 1.90),
                'objetivo_treino' => fake()->randomElement(['Hipertrofia', 'Emagrecimento', 'Condicionamento Físico']),
            ]);
        }
    }
}
