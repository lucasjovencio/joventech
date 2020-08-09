<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Publicacao\PublicacaoService;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use App\Traits\RedisTrait;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

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
        $post = $publicacaoService->getPost($id);
        SEOTools::setTitle($post->titulo);
        SEOTools::setDescription($post->resumo);
        SEOTools::opengraph()->setUrl(route('home.blog.show',['id'=>$post->id,'slug'=>$post->slug]));
        SEOTools::setCanonical(route('home.blog.show',['id'=>$post->id,'slug'=>$post->slug]));
        SEOTools::opengraph()->addProperty('type', 'articles');
        foreach ($post->categorias as $categoria) {
            SEOMeta::addMeta('article:section', $categoria->nome_categoria, 'property');
        }
        // SEOMeta::addKeyword(['key1', 'key2', 'key3']); //TAGS
        SEOTools::jsonLd()->addImage($post->imagem_destaque);
        return view('web.publicacoes.show',[
            'post' => $post
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
