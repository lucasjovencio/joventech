<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Publicacao\PublicacaoService;
use Illuminate\Http\Request;
use App\Traits\RedisTrait;

class PublicacoesController extends Controller
{
    use RedisTrait;

    public function index(Request $request,PublicacaoService $publicacaoService)
    {
        if($request->ajax()){
            return response()->json($publicacaoService->getBlogPosts($request->skip,$request->take),200);
        }
        return view('web.publicacoes.index',[
            'posts' => $publicacaoService->getBlogPosts(),
        ]);
    }

    public function categoria($categoria,Request $request,PublicacaoService $publicacaoService)
    {
        if($request->ajax()){
            return response()->json($publicacaoService->getBlogPostsCategoria($categoria,$request->skip,$request->take),200);
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
