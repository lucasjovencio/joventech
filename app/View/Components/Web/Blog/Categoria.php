<?php

namespace App\View\Components\Web\Blog;

use App\Services\Categoria\CategoriaService;
use Illuminate\View\Component;

class Categoria extends Component
{
    private $categoriaService;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService=$categoriaService;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.web.blog.categoria',['categorias'=>$this->categoriaService->getBlogCategoriasSubCategoria()]);
    }
}
