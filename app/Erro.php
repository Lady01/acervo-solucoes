<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Erro extends Model
{
    protected $table = 'erros';
    protected $fillable = ['categoria_id','descricao'];
    public function solucoes()
    {
        return $this->hasMany('App\Solucao');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
