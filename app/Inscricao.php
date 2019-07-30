<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';
    public function titulos()
    {
        return $this->belongsToMany('App\Titulo', 'inscricoes_titulos', 'fk_inscricoes_id', 'fk_titulos_id');
    }
}
