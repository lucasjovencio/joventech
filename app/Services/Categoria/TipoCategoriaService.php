<?php

namespace App\Services\Categoria;

use App\Models\TipoCategoria as Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use App\Traits\RedisTrait;

class TipoCategoriaService
{
    use RedisTrait;

    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getTipoCategoriasDataTable(Object $request)
    {
        if(!$tipoCategorias = $this->getRedis('tipo-categorias'))
            $tipoCategorias = $this->setRedis('tipo-categorias',$this->model->all()->toArray());

        return DataTables::of($tipoCategorias)
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
                    $btn = '<a href="#" data-nome="'.($row->nome ?? '').'" data-toggle="modal" id="" data-target="#update" data-src="'.route('tipo-categoria.update',['tipo_categorium'=>$row->id]).'" onClick="update(this)" class="edit btn btn-primary btn-sm">Editar</a>';
                    $btn .= ' <a href="#" data-toggle="modal" id="" data-target="#remover" data-nome="'.($row->nome ?? '').'" data-id="'.$row->id.'" data-src="'.route('tipo-categoria.destroy',['tipo_categorium'=>$row->id]).'" onClick="remover(this)" class=" btn btn-danger btn-sm">Excluir</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function all()
    {
        if(!$tipoCategorias = $this->getRedis('tipo-categorias'))
            $tipoCategorias = $this->setRedis('tipo-categorias',$this->model->all()->toArray());
        return $tipoCategorias;
    }

}