<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estados;

class Cidades extends Estados
{
    protected $table = 'cidades';

    // informações que o user pode salvar no DB 
    protected $fillable = [
        'nome_cidade',
        'id_estado',
    ];

    public function estado()
    {
        return $this->belongsTo('App\Models\Estados', 'id_estado');
    }
}
