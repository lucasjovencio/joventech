<?php

namespace App\Services\Categoria;

use App\Repositories\CategoriaRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Categoria as Model;
use Illuminate\Support\Str;
use App\Traits\RedisTrait;

class SubCategoriaService
{
    use RedisTrait;

    private $model;
    private $repo;

    public function __construct(Model $model,CategoriaRepository $repo)
    {
        $this->model = $model;
        $this->repo = $repo;
    }

    public function getSubCategoriasDataTable(Object $request,$id)
    {
        if(!$subcategorias = $this->getRedis("sub-categorias{$id}"))
            $subcategorias = $this->setRedis("sub-categorias{$id}",$this->repo->allArrayParents($id));

        return DataTables::of($subcategorias)
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
                ->addColumn('action', function($row){
                    $btn = '<a href="#" data-nome="'.($row->nome ?? '').'" data-toggle="modal" id="" data-target="#update" data-src="'.route('sub-categoria.update',['sub_categorium'=>$row->id]).'" onClick="update(this)" class="edit btn btn-primary btn-sm">Editar</a>';
                    $btn .= ' <a href="#" data-toggle="modal" id="" data-target="#remover" data-nome="'.($row->nome ?? '').'" data-id="'.$row->id.'" data-src="'.route('sub-categoria.destroy',['sub_categorium'=>$row->id]).'" onClick="remover(this)" class=" btn btn-danger btn-sm">Excluir</a>';
                    return $btn;
                })
            ->rawColumns(['action'])
            ->make(true);
    }

}