<?php

namespace App\Services\Publicacao;

use App\Models\Publicacao as Model;
use App\Repositories\PublicacaoRepository;
use App\Services\Categoria\PublicacaoCategoriaService;
use App\Traits\RedisTrait;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PublicacaoService
{
    use RedisTrait;

    private $model;
    private $publicacaoCategoriaService;
    private $repo;

    public function __construct(
        Model $model,
        PublicacaoRepository $repo,
        PublicacaoCategoriaService $publicacaoCategoriaService
    )
    {
        $this->model = $model;
        $this->repo = $repo;
        $this->publicacaoCategoriaService = $publicacaoCategoriaService;
    }

    public function getAllPublicacoes(Object $request)
    {
        if(!$publicacoes = $this->getRedis('publicacoes'))
            $publicacoes = $this->setRedis('publicacoes',$this->repo->allArrayPublicacoes());

        return DataTables::of($publicacoes)
            ->addColumn('titulo', function($row){
                return $row->titulo ?? '';
            })
            ->addColumn('visibilidade', function($row){
                return  $row->visibilidade;
            })
            ->addColumn('postadoem', function($row){
                return  Carbon::parse($row->publicado_em)->format('d/m/Y h:i:s');
            })
            ->addColumn('autor', function($row){
                return  $row->autor->name ?? '';
            })
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('publicacao.show',['publicacao'=>$row->id]).'" class="edit btn btn-primary btn-sm">Acessar</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create(Object $request)
    {
        $publicacao = $this->model->create([
            'titulo' => $request->titulo ?? '',
            'resumo' => $request->resumo ?? '',
            'conteudo' => $request->conteudo ?? '',
            'imagem_destaque' => $request->imagem_destaque ?? '',
            'users_id' => Auth::id(),
            'tipo_publicacao' => $request->tipo_publicacao,
            'publicado_em' => $request->publicado_em ?? now()->format('Y-m-d h:i:s'),
            'visibilidade' => ($request->visibilidade) ? 'Publico' : 'Privado',
        ]);
        $this->publicacaoCategoriaService->vinculaPublicacaoCategoria($publicacao->id,$request->categorias);
    }

    public function update(int $id,Object $request)
    {
        $publicacao = $this->model->id($id)->firstOrFail();
        $publicacao->update([
            'titulo'            => $request->titulo             ?? '',
            'resumo'            => $request->resumo             ?? '',
            'conteudo'          => $request->conteudo           ?? '',
            'imagem_destaque'   => $request->imagem_destaque    ?? '',
            'tipo_publicacao'   => $request->tipo_publicacao,
            'publicado_em'      => ($request->publicado_em)     ? $request->publicado_em." 23:59:59" : now()->format('Y-m-d h:i:s'),
            'visibilidade'      => ($request->visibilidade)     ? 'Publico' : 'Privado',
        ]);
        $this->publicacaoCategoriaService->removeCategorias($id);
        $this->publicacaoCategoriaService->vinculaPublicacaoCategoria($publicacao->id,$request->categorias);
    }

    public function getBlogLast3()
    {
        return $this->getCollectRedis('publicacoes')->where('tipo.nome',"Blog")->map(function ($collection, $key) {
            return collect($collection)->put('categorias',$this->getCollectRedis("publicacao{$collection->id}-categorias"));
        })->sortByDesc('publicado_em')->take(3);
    }
}