<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rastreamento extends Model
{
    protected $fillable = [
        'id_rastreamento',
        'id_encomenda',
        'status_entrega',
        'localizacao',
        'data_hora',
        'observacao',
        'controlado',
    ];

    public function pedido()
    {
        return $this->belongsTo(pedido::class, 'produto_id');
    }
}
