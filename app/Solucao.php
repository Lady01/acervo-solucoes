<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solucao extends Model
{
    protected $table = 'solucoes';
    protected $fillable = ['erro_id','descricao'];

    public function erro()
    {
        return $this->belongsTo('App\Erro');
    }
}
