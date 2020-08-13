<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use SoftDeletes;
    
    protected $table = 'contatos';

    protected $fillable = [
        'nome','email','assunto','mensagem','codigo','lido'
    ];

    public function scopeId($query,$id)
    {
        return $query->where('id',$id);
    }

    public function scopeUnread($query)
    {
        return $query->where('lido',0);
    }
}
