<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferramenta extends Model
{
    use HasFactory;

    protected $title = 'ferramentas';
    protected $fillable = [
        'nome',
        'marca',
        'tipo',
        'fornecedor',
        'preco',
        'qtd'
    ];

    
}
