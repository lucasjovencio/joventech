<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class PublicacaoCategoria extends Model
{
    protected $table = 'publicacao_categorias';

    protected $fillable = [
        'publicacoes_id','categorias_id'
    ];

    protected $appends = [
        'nome_categoria','slug'
    ];

    public function getNomeCategoriaAttribute()
    {
        return $this->categoria->nome;
    }

    public function getSlugAttribute()
    {
        return $this->categoria->slug ?? $this->categoria->nome ?? '';
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categorias_id','id')->select('id','nome','slug');
    }

    public function scopeIdPublicacao($query,$id)
    {
        return $query->where('publicacoes_id',$id);
    }
}
