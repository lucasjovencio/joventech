<?php

namespace App\View\Components\Web\Home;

use Illuminate\View\Component;
use App\Services\Publicacao\DepoimentoService;

class SectionDepoimento extends Component
{
    private $depoimentos;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(DepoimentoService $depoimentoService)
    {
        $this->depoimentos = $depoimentoService->getDepoimentos();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.web.home.section-depoimento',['depoimentos'=>$this->depoimentos]);
    }
}
