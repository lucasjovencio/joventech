<?php

namespace App\Services\Publicacao;

use App\Models\Publicacao as Model;
use App\Repositories\PublicacaoRepository;
use App\Traits\RedisTrait;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProjetoService
{
    use RedisTrait;

    private $model;
    private $repo;

    public function __construct(
        Model $model,
        PublicacaoRepository $repo
    )
    {
        $this->model = $model;
        $this->repo = $repo;
    }

    private function all()
    {
        if(!$data = $this->getRedis('publicacoes'))
            $data = $this->setRedis('publicacoes',$this->repo->allArrayPublicacoes());
        return collect($data);
    }

    public function getAllProjetosDataTable(Object $request)
    {
        return DataTables::of($this->all())
            ->addIndexColumn()
            ->filter(function ($instance) {
                $instance->collection = $instance->collection->filter(function ($row) {
                    return Str::contains(strtolower($row['tipo_publicacao']),strtolower("projeto")) ? true : false;
                });
            })
            ->addColumn('titulo', function($row){
                return $row->titulo ?? '';
            })
            ->addColumn('visibilidade', function($row){
                return  $row->visibilidade;
            })
            ->addColumn('postadoem', function($row){
                return  Carbon::parse($row->publicado_em)->format('d/m/Y H:i');
            })
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('projeto.show',['projeto'=>$row->id]).'" class="edit btn btn-primary btn-sm">Acessar</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create(Object $request)
    {
        return $this->model->create([
            'titulo'            => $request->titulo             ?? '',
            'resumo'            => $request->resumo             ?? '',
            'conteudo'          => $request->conteudo           ?? '',
            'imagem_destaque'   => $request->imagem_destaque    ?? '',
            'link_externo'      => $request->link_externo       ?? '',
            'slug'              => $request->slug               ?? '',
            'users_id'          => Auth::id(),
            'tipo_publicacao'   => 'projeto',
            'publicado_em'      => ($request->publicado_em)     ? Carbon::createFromFormat('d/m/Y H:i',$request->publicado_em)->format('Y-m-d H:i:s') : now()->format('Y-m-d h:i:s'),
            'visibilidade'      => ($request->visibilidade)     ? 'Publico' : 'Privado',
        ]);
    }

    public function update(int $id,Object $request)
    {
        $publicacao = $this->model->id($id)->firstOrFail();
        $publicacao->update([
            'titulo'            => $request->titulo             ?? '',
            'resumo'            => $request->resumo             ?? '',
            'conteudo'          => $request->conteudo           ?? '',
            'imagem_destaque'   => $request->imagem_destaque    ?? '',
            'link_externo'      => $request->link_externo       ?? '',
            'slug'              => $request->slug               ?? '',
            'tipo_publicacao'   => 'projeto',
            'publicado_em'      => Carbon::createFromFormat('d/m/Y H:i',$request->publicado_em)->format('Y-m-d H:i:s'),
            'visibilidade'      => ($request->visibilidade)     ? 'Publico' : 'Privado',
        ]);
        $this->setRedis('publicacoes',$this->repo->allArrayPublicacoes());
    }

    public function getProjetos()
    {
        return \json_decode($this->all()
            ->where('tipo_publicacao',"projeto")
            ->where('visibilidade','Publico')
            ->sortByDesc('publicado_em')
        );
    }

    public function getProjetosPosts($skip=0,$take=2)
    {
        return \json_decode($this->all()
            ->where('tipo_publicacao',"projeto")
            ->where('visibilidade','Publico')
            ->sortByDesc('publicado_em')
            ->skip($skip)->take($take)
        );
    }

    public function getProjetoLast3()
    {
        return \json_decode($this->all()->where('tipo_publicacao',"projeto")->where('visibilidade','Publico')->sortByDesc('publicado_em')->take(3));
    }
    
}