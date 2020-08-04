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
        'titulo','resumo','tipo_publicacao','conteudo','imagem_destaque','users_id','publicado_em','visibilidade'
    ];

    protected $appends = [
        'data_publicacao'
    ];

    public function getDataPublicacaoAttribute()
    {
        $date = Carbon::parse($this->publicado_em)->setTimezone('America/Sao_Paulo');
        $diff = now()->setTimezone('America/Sao_Paulo')->diffInDays($date);
        if( $diff == 1){
            return 'Um dia atrás';
        }
        elseif($diff>1){
            return $date->format('d/m/Y H:i');
        }
        elseif($diff==0){
            return $date->format('H:i');
        }
        return $date->format('H:i');
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
