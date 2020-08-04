<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Publicacao\PublicacaoService;
use App\Services\Publicacao\DepoimentoService;

class HomeController extends Controller
{
    public function index(PublicacaoService $publicacaoService,DepoimentoService $depoimentoService)
    {
        return view('web.home.index',[
            'blogs' => $publicacaoService->getBlogLast3(),
            'depoimentos' => $depoimentoService->getDepoimentos(),
        ]);
    }
}
