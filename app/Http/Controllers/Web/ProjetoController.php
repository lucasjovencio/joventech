<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Publicacao\ProjetoService;
use App\Traits\JsonResponseTrait;
use App\Traits\RedisTrait;
use Illuminate\Http\Request;

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
        return view('web.projetos.show',[
            'projeto' => $this->findRedis('publicacoes',$id),
        ]);
    }
}
