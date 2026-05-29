<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encomendas extends Model
{
    protected $fillable = [
        'id_encomenda',
        'id_pedido',
        'codigo_rastreio',
        'peso_kg',
        'valor_declarado',
        'status',
        'data',
    ];

    protected $casts = [
        'preco'         => 'decimal:2',
        'data_validade' => 'date',
    ];

    /**
     * Verifica se o estoque está baixo (menos de 10 unidades).
     */
    public function estoqueBaixo(): bool
    {
        return $this->quantidade < 10;
    }
}
