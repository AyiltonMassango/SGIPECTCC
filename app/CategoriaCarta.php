<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaCarta extends Model{
    protected $table = 'categoria_cartas';
    protected $fillable = ['id','designacao'];

    public function getEscolas(){
        return $this->belongsToMany(Escola::class);
    }
}
