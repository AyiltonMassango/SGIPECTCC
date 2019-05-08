<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model{
    protected $table = 'enderecos';
    protected $fillable = ['id','bairro','quarteirao','avenida_rua','nr_casa','distrito_id'];

    public function escola(){
        return $this->hasMany(Escola::class,'endereco_id');
    }
}
