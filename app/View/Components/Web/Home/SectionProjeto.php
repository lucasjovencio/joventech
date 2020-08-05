<?php

namespace App\View\Components\Web\Home;

use App\Services\Publicacao\ProjetoService;
use Illuminate\View\Component;

class SectionProjeto extends Component
{
    private $projetos;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ProjetoService $projetoService)
    {
        $this->projetos=$projetoService->getProjetoLast3();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.web.home.section-projeto',['projetos'=>$this->projetos]);
    }
}
