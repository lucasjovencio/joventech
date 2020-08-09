<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Publicacao\ProjetoService;
use App\Traits\JsonResponseTrait;
use App\Traits\RedisTrait;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class ProjetoController extends Controller
{
    use RedisTrait,JsonResponseTrait;

    public function index(Request $request,ProjetoService $projetoService)
    {
        if($request->ajax()){
            return $this->jsonResponseSuccess($projetoService->getProjetosPosts($request->skip,$request->take),200);
        }
        return view('web.projetos.index',['projetos'=>$projetoService->getProjetosPosts()]);
    }

    public function show($id)
    {
        $projeto = $this->findRedis('publicacoes',$id);
        SEOTools::setTitle($projeto->titulo);
        SEOTools::setDescription($projeto->resumo);
        SEOTools::opengraph()->setUrl(route('home.projeto.show',['id'=>$projeto->id,'slug'=>$projeto->slug]));
        SEOTools::setCanonical(route('home.projeto.show',['id'=>$projeto->id,'slug'=>$projeto->slug]));
        SEOTools::opengraph()->addProperty('type', 'projects');
        // SEOMeta::addKeyword(['key1', 'key2', 'key3']); //TAGS
        SEOTools::jsonLd()->addImage($projeto->imagem_destaque);
        return view('web.projetos.show',[
            'projeto' => $projeto,
        ]);
    }
}
