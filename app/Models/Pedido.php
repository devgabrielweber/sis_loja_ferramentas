<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedido';
    protected $fillable = [
        'cliente_id',
        'preco',
    ];

    protected $casts = [
        'preco' => 'float',
        'cliente_id' => 'integer',
    ];
}
