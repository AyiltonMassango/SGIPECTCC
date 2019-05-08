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
        'funcionario_id',
        'escola_id',
        'estado_pagamento',
        'pasta',
        'nr_carta',
        'historico',
        'codigo_barras',
    ];

    public function getAluno(){
        return $this->hasOne(Aluno::class,'id','aluno_id');
    }

    public function getCarta(){
        return $this->hasOne(CategoriaCarta::class,'id','categoria_carta_id');
    }
}
