<?php

namespace App\View\Components\Admin\Dashboard;

use Illuminate\View\Component;
use App\Models\Lead;
class Notificacao extends Component
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
        return view('components.admin.dashboard.notificacao',['contatos'=>Lead::unread()->get()]);
    }
}
