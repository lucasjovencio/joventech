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
            'titulo'            => $request->titulo             ?? '',
            'resumo'            => $request->resumo             ?? '',
            'conteudo'          => $request->conteudo           ?? '',
            'imagem_destaque'   => $request->imagem_destaque    ?? '',
            'users_id'          => Auth::id(),
            'tipo_publicacao'   => $request->tipo_publicacao,
            'publicado_em'      => ($request->publicado_em)     ? Carbon::createFromFormat('d/m/Y h:i',$request->publicado_em)->format('Y-m-d H:i:s') : now()->format('Y-m-d h:i:s'),
            'visibilidade'      => ($request->visibilidade)     ? 'Publico' : 'Privado',
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
            'publicado_em'      => Carbon::createFromFormat('d/m/Y h:i',$request->publicado_em)->format('Y-m-d H:i:s'),
            'visibilidade'      => ($request->visibilidade)     ? 'Publico' : 'Privado',
        ]);
        $this->setRedis('publicacoes',$this->repo->allArrayPublicacoes());
        $this->publicacaoCategoriaService->removeCategorias($id);
        $this->publicacaoCategoriaService->vinculaPublicacaoCategoria($publicacao->id,$request->categorias);
    }

    public function getBlogPosts($skip=0,$take=2)
    {
        return \json_decode($this->getCollectRedis('publicacoes')->where('tipo.nome',"Blog")->where('visibilidade','Publico')->map(function ($collection, $key) {
            return collect($collection)->put('categorias',$this->getCollectRedis("publicacao{$collection->id}-categorias"));
        })->sortByDesc('publicado_em')->skip($skip)->take($take));
    }

    public function getBlogPostsCategoria($categoria,$skip=0,$take=2)
    {
        return \json_decode($this->getCollectRedis('publicacoes')
            ->where('tipo.nome',"Blog")
            ->where('visibilidade','Publico')
            ->map(function ($collection, $key) {
                return collect($collection)->put('categorias',$this->getCollectRedis("publicacao{$collection->id}-categorias"));
            })
            ->filter(function ($collection) use($categoria) {
                $result = false;
                $collection->get('categorias')->map(function ($collection, $key) use($categoria,&$result) {
                    if(collect($collection)->contains($categoria)){
                        $result=true;
                    }
                });
                return $result;
            })
            ->sortByDesc('publicado_em')->skip($skip)->take($take)
        );
    }
    
    public function getSearchBlogPosts($search)
    {
        return \json_decode($this->getCollectRedis('publicacoes')
                ->where('tipo.nome',"Blog")
                ->where('visibilidade','Publico')
                ->filter(function($item) use ($search) {
                    if(Str::contains(strtolower($item->titulo),strtolower($search)))
                        return true;
                    else if(Str::contains(strtolower($item->resumo),strtolower($search)))
                        return true;
                    else if(Str::contains(strtolower($item->conteudo),strtolower($search)))
                        return true;
                    return false;
                })
                ->map(function ($collection, $key) {
                    return collect($collection)->put('categorias',$this->getCollectRedis("publicacao{$collection->id}-categorias"));
                })
                ->sortByDesc('publicado_em')
        );
    }

    public function getBlogLast3()
    {
        return \json_decode($this->getCollectRedis('publicacoes')->where('tipo.nome',"Blog")->where('visibilidade','Publico')->map(function ($collection, $key) {
            return collect($collection)->put('categorias',$this->getCollectRedis("publicacao{$collection->id}-categorias"));
        })->sortByDesc('publicado_em')->take(3));
    }

    public function getPost($id){
        return \json_decode($this->getCollectRedis('publicacoes')->where('id',$id)->where('visibilidade','Publico')->map(function ($collection, $key) {
            return collect($collection)->put('categorias',$this->getCollectRedis("publicacao{$collection->id}-categorias"));
        })->first());
    }
}