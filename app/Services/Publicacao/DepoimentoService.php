<?php

namespace App\Services\Publicacao;

use App\Models\Publicacao as Model;
use App\Repositories\PublicacaoRepository;
use App\Traits\RedisTrait;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DepoimentoService
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

    public function getAllDepoimentosDataTable(Object $request)
    {
        if(!$depoimentos = $this->getRedis('publicacoes'))
            $depoimentos = $this->setRedis('publicacoes',$this->repo->allArrayPublicacoes());

        return DataTables::of($depoimentos)
            ->addIndexColumn()
            ->filter(function ($instance) {
                $instance->collection = $instance->collection->filter(function ($row) {
                    return Str::contains(strtolower($row['tipo_publicacao']),strtolower("depoimento")) ? true : false;
                });
            })
            ->addColumn('de', function($row){
                return $row->titulo ?? '';
            })
            ->addColumn('visibilidade', function($row){
                return  $row->visibilidade;
            })
            ->addColumn('postadoem', function($row){
                return  Carbon::parse($row->publicado_em)->format('d/m/Y H:i');
            })
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('depoimento.show',['depoimento'=>$row->id]).'" class="edit btn btn-primary btn-sm">Acessar</a>';
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
            'users_id'          => Auth::id(),
            'tipo_publicacao'   => 'depoimento',
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
            'tipo_publicacao'   => 'depoimento',
            'publicado_em'      => Carbon::createFromFormat('d/m/Y H:i',$request->publicado_em)->format('Y-m-d H:i:s'),
            'visibilidade'      => ($request->visibilidade)     ? 'Publico' : 'Privado',
        ]);
        $this->setRedis('publicacoes',$this->repo->allArrayPublicacoes());
    }

    public function getDepoimentos()
    {
        return \json_decode($this->getCollectRedis('publicacoes')
            ->where('tipo_publicacao',"depoimento")
            ->where('visibilidade','Publico')
            ->sortByDesc('publicado_em')
        );
    }
    
}