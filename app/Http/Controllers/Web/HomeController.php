<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index()
    {
        SEOTools::setTitle("JovenTech Tecnologias");
        SEOTools::setDescription("Um site de tecnologias.");
        SEOTools::opengraph()->setUrl(route('home.index'));
        SEOTools::setCanonical(route('home.index'));
        return view('web.home.index');
    }
}
