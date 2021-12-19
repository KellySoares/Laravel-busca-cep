<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table = 'estados';

    // informações que o user pode salvar no DB 
    protected $fillable = [
        'nome',
        'sigla',
    ];

    public function cidades()
    {
        return $this->hasMany('App\Models\Cidades', 'id_estado');
    }
}
