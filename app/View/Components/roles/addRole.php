<?php

namespace App\View\Components\roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class addRole extends Component
{

    public $menus;
    /**
     * Create a new component instance.
     */
    public function __construct($menus)
    {
        $this->menus = $menus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.roles.add-role');
    }
}
