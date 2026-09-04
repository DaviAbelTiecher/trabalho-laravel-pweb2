<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modalidade;

class ModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modalidade::create([
            'nome_modalidade' => 'Musculação',
            'descricao' => 'Treinamento resistido para ganho de força e massa muscular.',
            'valor_mensal' => 120.00,
        ]);

        Modalidade::create([
            'nome_modalidade' => 'Crossfit',
            'descricao' => 'Treinamento funcional de alta intensidade.',
            'valor_mensal' => 180.00,
        ]);

        Modalidade::create([
            'nome_modalidade' => 'Pilates',
            'descricao' => 'Exercícios focados em flexibilidade, postura e controle corporal.',
            'valor_mensal' => 150.00,
        ]);

        Modalidade::create([
            'nome_modalidade' => 'Natação',
            'descricao' => 'Aulas de natação para todos os níveis.',
            'valor_mensal' => 160.00,
        ]);

        Modalidade::create([
            'nome_modalidade' => 'Spinning',
            'descricao' => 'Ciclismo indoor de alta queima calórica.',
            'valor_mensal' => 110.00,
        ]);
    }
}
