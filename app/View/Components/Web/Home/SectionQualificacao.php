<?php

namespace App\View\Components\Web\Home;

use Illuminate\View\Component;

class SectionQualificacao extends Component
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
        return view('components.web.home.section-qualificacao');
    }
}
