<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model{
    protected $table = 'pagamentos';
    protected $fillable =['id','valor_pagar','recibo_nr','data_deposito','funcionario_id','inscricao_id','tipo_pagamento'];
}
