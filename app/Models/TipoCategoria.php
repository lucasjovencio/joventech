<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCategoria extends Model
{
    use SoftDeletes;
    
    protected $table = 'tipo_categorias';

    protected $fillable = [
        'nome'
    ];

    public function scopeId($query,$id)
    {
        return $query->where('id',$id);
    }
}
