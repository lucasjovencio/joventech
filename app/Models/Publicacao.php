<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\TipoCategoria;
use App\Models\PublicacaoCategoria;
use Illuminate\Support\Carbon;

class Publicacao extends Model
{
    use SoftDeletes;
    
    protected $table = 'publicacoes';

    protected $fillable = [
        'titulo','resumo','tipo_publicacao','link_externo','conteudo','imagem_destaque','users_id','publicado_em','visibilidade','slug'
    ];

    protected $appends = [
        'data_publicacao'
    ];

    public function getDataPublicacaoAttribute()
    {
        $data = Carbon::parse($this->publicado_em);
        return $data->format('d/m/Y')." às ".$data->format('H:i');
    }

    public function scopeId($query,$id)
    {
        return $query->where('id',$id);
    }

    public function autor()
    {
        return $this->hasOne(User::class,'id','users_id')->select('id','name');
    }

    public function categorias()
    {
        return $this->hasMany(PublicacaoCategoria::class,'publicacoes_id','id')->select('id','publicacoes_id','categorias_id');
    }
}
