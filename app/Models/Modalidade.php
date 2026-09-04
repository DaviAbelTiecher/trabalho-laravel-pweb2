<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modalidade extends Model
{
    use HasFactory;

    protected $table = 'modalidades';

    protected $fillable = [
        'nome_modalidade',
        'descricao',
        'valor_mensal',
    ];

    protected $casts = [
        'valor_mensal' => 'float',
    ];
}
