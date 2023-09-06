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
        'total',
        'data'
    ];

    protected $casts = [
        'total' => 'float',
        'cliente_id' => 'integer',
        'data' => 'string'
    ];
}
