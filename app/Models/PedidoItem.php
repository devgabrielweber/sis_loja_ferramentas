<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    protected $table = 'pedido_item';
    protected $fillable = [
        'pedido_id',
        'ferramenta_id'
    ];
    protected $casts = [
        'pedido_id' => 'integer',
        'ferramenta_id' => 'integer',
    ];
}
