<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientePessoa extends Model
{
    use HasFactory;
    protected $title = 'cliente';
    protected $fillable = [
        'nome',
        'cpf',
        'cnpj',
        'telefone',
        'email',
        'endereco'
    ];
}
