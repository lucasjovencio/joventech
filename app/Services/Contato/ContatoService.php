<?php

namespace App\Services\Contato;

use App\Models\Contato as Model;
use App\Repositories\ContatoRepository;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContatoService
{
    private $model;
    private $repo;

    public function __construct(
        Model $model,
        ContatoRepository $repo
    )
    {
        $this->model = $model;
        $this->repo = $repo;
    }

    public function getAllContatos(Object $request)
    {
        return DataTables::of($this->repo->allArrayContatos())
            ->addIndexColumn()
            ->addColumn('nome', function($row){
                return $row['nome'] ?? '';
            })
            ->addColumn('email', function($row){
                return  $row['email'] ?? '';
            })
            ->addColumn('assunto', function($row){
                return  $row['assunto'] ?? '';
            })
            ->addColumn('enviado', function($row){
                return Carbon::parse($row['created_at'])->format('d/m/Y H:i');
            })
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('contato.show',['contato'=>$row['id']]).'" class="edit btn btn-primary btn-sm">Acessar</a>';
                $btn .= ' <a href="#" data-toggle="modal" id="" data-target="#remover" data-nome="'.($row['assunto'] ?? '').'" data-id="'.$row['id'].'" data-src="'.route('contato.destroy',['contato'=>$row['id']]).'" onClick="remover(this)" class=" btn btn-danger btn-sm">Excluir</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    

    public function create(Object $request)
    {
        return $this->model->create([
            'nome'       => $request->nome        ?? '',
            'email'      => $request->email       ?? '',
            'assunto'    => $request->assunto     ?? '',
            'mensagem'   => $request->mensagem    ?? '',
            'codigo'     => Str::uuid(),
        ]);
    }

    public function find($id)
    {
        return $this->model->id($id)->firstOrFail();
    }
}