<?php

namespace App\Services\Categoria;

use App\Models\PublicacaoCategoria as Model;
use App\Traits\RedisTrait;

class PublicacaoCategoriaService
{
    use RedisTrait;

    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getPublicacaoCategorias(int $publicacao)
    {
        return $this->model->idPublicacao($publicacao)->with('categoria')->get();
    }

    public function getRedisPublicacaoCategorias(int $publicacao) : array
    {
        if(!$categorias = $this->getRedis("publicacao{$publicacao}-categorias"))
            $categorias = $this->setRedis("publicacao{$publicacao}-categorias",$this->getPublicacaoCategorias($publicacao)->toArray());
        return $categorias;
    }

    public function vinculaPublicacaoCategoria(int $publicacao,array $categorias) :void
    {
        foreach($categorias as $categoria){
            $this->model->create([
                'publicacoes_id'    => $publicacao,
                'categorias_id'     => $categoria 
            ]);
        }
        $this->setRedis("publicacao{$publicacao}-categorias",$this->getPublicacaoCategorias($publicacao)->toArray());
    }

    public function removeCategorias(int $publicacao) :void
    {
        $this->model->idPublicacao($publicacao)->delete();
    }

}