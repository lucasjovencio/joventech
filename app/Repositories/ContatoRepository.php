<?php

namespace App\Repositories;

use App\Models\Contato as Model;

class ContatoRepository
{
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function allArrayContatos() : array
    {
        return $this->model->all()->toArray();
    }
}