<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model{

    protected $table = 'escolas';
    protected $fillable =['id','nome','alvara_nr','nuit','slogan','pasta','logo','estado','endereco_id','cor_escola'];
}
