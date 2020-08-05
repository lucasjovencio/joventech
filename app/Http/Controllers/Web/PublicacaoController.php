<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Publicacao\PublicacaoService;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use App\Traits\RedisTrait;

class PublicacaoController extends Controller
{
    use RedisTrait,JsonResponseTrait;

    public function index(Request $request,PublicacaoService $publicacaoService)
    {
        if($request->ajax()){
            return $this->jsonResponseSuccess($publicacaoService->getBlogPosts($request->skip,$request->take),200);
        }
        return view('web.publicacoes.index',[
            'posts' => $publicacaoService->getBlogPosts(),
        ]);
    }

    public function categoria($categoria,Request $request,PublicacaoService $publicacaoService)
    {
        if($request->ajax()){
            return $this->jsonResponseSuccess($publicacaoService->getBlogPostsCategoria($categoria,$request->skip,$request->take),200);
        }
        return view('web.publicacoes.categoria',[
            'posts'     =>  $publicacaoService->getBlogPostsCategoria($categoria),
            'categoria' =>  $categoria
        ]);
    }

    public function show($id,PublicacaoService $publicacaoService)
    {
        return view('web.publicacoes.show',[
            'post' => $publicacaoService->getPost($id),
            'recentes' => $publicacaoService->getBlogLast3()
        ]);
    }

    public function search(Request $request,PublicacaoService $publicacaoService)
    {
        return view('web.publicacoes.search',[
            'posts' => $publicacaoService->getSearchBlogPosts($request->termo),
            'termo' => $request->termo
        ]);
    }
}
