<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    
    protected $table = 'categorias';

    protected $fillable = [
        'nome','categorias_id','slug'
    ];

    public function subCategorias()
    {
        return $this->belongsTo(Categoria::class,'categorias_id');
    }

    public function scopeId($query,$id)
    {
        return $query->where('id',$id);
    }

    public function scopeWhereDoesntHaveParent($query)
    {
        return $query->whereNull('categorias_id');
    }

    public function scopeParent($query,$id)
    {
        return $query->where('categorias_id',$id);
    }

    public function isParent()
    {
        return $this->categorias_id ? true : false;
    }
}
