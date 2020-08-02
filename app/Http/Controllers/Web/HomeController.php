<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Publicacao\PublicacaoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(PublicacaoService $publicacaoService)
    {
        // dd(\json_decode($publicacaoService->getBlogLast3()));
        return view('web.home.index',[
            'blogs' => $publicacaoService->getBlogLast3()
        ]);
    }
}
