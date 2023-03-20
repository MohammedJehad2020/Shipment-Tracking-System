<?php

namespace App\View\Components\roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class allRoles extends Component
{
    public $roles;
    /**
     * Create a new component instance.
     */
    public function __construct($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.roles.all-roles');
    }
}
