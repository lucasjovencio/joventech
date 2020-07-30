<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicao extends Model
{
    use SoftDeletes;
    
    protected $table = 'publicacoes';

    protected $fillable = [
        'titulo','resumo','conteudo','imagem_destaque','users_id','publicado_em','visibilidade'
    ];
}
