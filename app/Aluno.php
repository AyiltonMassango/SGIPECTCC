<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model{
    protected $table ='alunos';
    protected $fillable =[
        'apelido',
        'nome',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'nacionalidade',
        'naturalidade',
        'profissao',
        'local_trabalho',
        'nivel_academico',
        'nome_pai',
        'nome_mae',
        'endereco_id',
        'tipo_documento_id',
    ];
}
