<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model{
    protected $table ='inscricaos';
    protected $fillable =['id',
        'nr_ficha',
        'foto_aluno',
        'percentagem_desconto',
        'total_a_pagar',
        'tipo_aulas',
        'categoria_carta_id',
        'aluno_id',
        'escola_id',
        'estado_pagamento',
        'pasta'
    ];
}
