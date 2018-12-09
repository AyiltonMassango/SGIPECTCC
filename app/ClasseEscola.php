<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClasseEscola extends Model{

    protected $table = 'classe_escolas';
    protected $fillable =['escola_id', 'cartacateg_id','preco', 'estado'];
}
