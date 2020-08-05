<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Publicacao\DepoimentoService;

class HomeController extends Controller
{
    public function index(DepoimentoService $depoimentoService)
    {
        return view('web.home.index',[
            'depoimentos' => $depoimentoService->getDepoimentos(),
        ]);
    }
}
