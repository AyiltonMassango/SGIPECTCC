<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model{
    protected $table = 'funcionarios';
    protected $fillable = ['id','apelido','nome','data_nascimento','sexo','estado_civil',
        'nacionalidade','naturalidade','nr_carta','nr_licenca','endereco_id',
        'tipo_documento_id','escola_id','categoria_funcionario_id','estado_funcionario','user_id'
    ];
}
