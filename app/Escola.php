<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model{

    protected $table = 'escolas';
    protected $fillable =['id','nome','alvara_nr','nuit','slogan','pasta','logo','estado','endereco_id','cor_escola'];

    public function getCategorias(){
        return $this->belongsToMany(CategoriaCarta::class,'classe_escolas','escola_id','cartacateg_id');
    }

    public function getInscricoes(){
        return $this->hasMany(Inscricao::class,'escola_id');
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class,'endereco_id');
    }
}
