<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model{
    protected $table = 'tipo_documentos';
    protected $fillable = [
        'designacao',
        'nr_documento',
        'data_emissao',
        'data_validade',
        'local_emissao',
    ];
}
