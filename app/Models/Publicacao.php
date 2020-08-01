<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\TipoCategoria;
use App\Models\PublicacaoCategoria;

class Publicacao extends Model
{
    use SoftDeletes;
    
    protected $table = 'publicacoes';

    protected $fillable = [
        'titulo','resumo','tipo_publicacao','conteudo','imagem_destaque','users_id','publicado_em','visibilidade'
    ];

    public function scopeId($query,$id)
    {
        return $query->where('id',$id);
    }

    public function autor()
    {
        return $this->hasOne(User::class,'id','users_id');
    }

    public function tipo()
    {
        return $this->hasOne(TipoCategoria::class,'id','tipo_publicacao');
    }

    public function categorias()
    {
        return $this->hasMany(PublicacaoCategoria::class,'publicacoes_id','id');
    }
}
