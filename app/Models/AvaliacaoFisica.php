<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AvaliacaoFisica extends Model
{
    use HasFactory;

    protected $table = 'avaliacao_fisicas';

    protected $fillable = [
        'aluno_id',
        'peso',
        'altura',
        'objetivo_treino',
    ];

    protected $casts = [
        'aluno_id' => 'integer',
        'peso' => 'float',
        'altura' => 'float',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
}
