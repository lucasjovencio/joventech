<?php

namespace App\View\Components\Web\Blog;

use Illuminate\View\Component;

class Pesquisa extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.web.blog.pesquisa');
    }
}
