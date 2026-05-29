<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id_pedido',
        'nome_rementente',
        'cpf_cnpj_remetente',
        'endereco_remetente',
        'cidade_remetente',
        'estado_remetente',
        'cep_remetente',
        'telefone_remetente',
        'nome_destinatario',
        'cpf_cnpj_destinatario',
        'endereco_destinatario',
        'cidade_destinatario',
        'estado_destinatario',
        'cep_destinatario',
        'telefone_destinatario',
        'codigo',
        'fabricante',
        'quantidade',
        
    ];

}
