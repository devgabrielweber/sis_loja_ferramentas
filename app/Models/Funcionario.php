<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $title = 'funcionarios';
    protected $fillable = [
        'nome',
        'cpf',
        'salario',
        'cargo',
        'telefone',
        'email',
        'endereco',
    ];
}
