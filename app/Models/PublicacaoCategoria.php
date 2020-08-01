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

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'id','categorias_id')->select('id','nome');
    }

    public function scopeIdPublicacao($query,$id)
    {
        return $query->where('publicacoes_id',$id);
    }
}
