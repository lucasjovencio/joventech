<?php

namespace App\View\Components\Web\Home;

use App\Services\Publicacao\PublicacaoService;
use Illuminate\View\Component;

class SectionBlog extends Component
{
    private $posts;
    /**
     * Create a new component instance.
     * 
     * @param  array  $posts
     * @return void
     */
    public function __construct(PublicacaoService $publicacaoService)
    {
        $this->posts=$publicacaoService->getBlogLast3();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.web.home.section-blog',['posts'=>$this->posts]);
    }
}
