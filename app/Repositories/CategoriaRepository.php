<?php

namespace App\Repositories;

use App\Models\Categoria as Model;

class CategoriaRepository
{
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function allArrayCategorias() : array
    {
        return $this->model->whereDoesntHaveParent()->get()->toArray();
    }

    public function allArrayParents($id) : array
    {
        return $this->model->parent($id)->get()->toArray();
    }
}