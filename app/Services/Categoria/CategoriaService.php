<?php

namespace App\Services\Categoria;

use App\Repositories\CategoriaRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Categoria as Model;
use Illuminate\Support\Str;
use App\Traits\RedisTrait;

class CategoriaService
{
    use RedisTrait;

    private $model;
    private $repo;

    public function __construct(Model $model,CategoriaRepository $repo)
    {
        $this->model = $model;
        $this->repo = $repo;
    }

    public function getCategoriasDataTable(Object $request)
    {
        if(!$categorias = $this->getRedis('categorias'))
            $categorias = $this->setRedis('categorias',$this->repo->allArrayCategorias());

        return DataTables::of($categorias)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if(!empty($request->get('nome'))){
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains(strtolower($row['nome']),strtolower($request->get('nome'))) ? true : false;
                        });
                    }
                })
                ->addColumn('nome', function($row){
                    return $row->nome ?? '';
                })
                ->addColumn('tipo', function($row){
                    return $row->tipo->nome ?? '';
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('categoria.show',['categorium'=>$row->id]).'" class="edit btn btn-primary btn-sm">Acessar</a>';
                    $btn .= ' <a href="#" data-toggle="modal" id="" data-target="#remover" data-nome="'.($row->nome ?? '').'" data-id="'.$row->id.'" data-src="'.route('categoria.destroy',['categorium'=>$row->id]).'" onClick="remover(this)" class=" btn btn-danger btn-sm">Excluir</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

}