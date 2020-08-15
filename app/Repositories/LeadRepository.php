<?php

namespace App\Repositories;

use App\Models\Lead as Model;

class LeadRepository
{
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function allArrayLeads() : array
    {
        return $this->model->all()->toArray();
    }
}