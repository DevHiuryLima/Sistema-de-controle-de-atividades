<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividades';
    protected $primaryKey = 'idAtividade';
    public $timestamps = true;
    
    protected $fillable = [
        'idAtividade',
        'tipoAtividade',
        'titulo',
        'descricao',
        'status',
    ];
}
