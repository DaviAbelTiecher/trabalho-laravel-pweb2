<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone',
    ];

    public function avaliacaoFisica()
    {
        return $this->hasOne(AvaliacaoFisica::class, 'aluno_id');
    }
}
