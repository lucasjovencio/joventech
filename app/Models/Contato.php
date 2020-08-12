<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use SoftDeletes;
    
    protected $table = 'contatos';

    protected $fillable = [
        'nome','email','assunto','mensagem','codigo'
    ];

    public function scopeId($query,$id)
    {
        return $query->where('id',$id);
    }
}
