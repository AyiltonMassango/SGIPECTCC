<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model{
    protected $table = 'contactos';
    protected $fillable =['id','nr_telefone','nr_alternativo','email','aluno_id','escola_id','funcionario_id'];
}
