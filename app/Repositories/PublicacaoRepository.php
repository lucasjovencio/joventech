<?php

namespace App\Repositories;

use App\Models\Publicacao as Model;

class PublicacaoRepository
{
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function allArrayPublicacoes() : array
    {
        return $this->model->with('autor','tipo')->get()->toArray();
    }

}