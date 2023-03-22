<?php

namespace App\View\Components\roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class roleShow extends Component
{
    public $role, $menus, $rolePermessionsIds;
    /**
     * Create a new component instance.
     */
    public function __construct($role, $menus, $rolePermessionsIds)
    {
        $this->role = $role;
        $this->menus = $menus;
        $this->rolePermessionsIds = $rolePermessionsIds;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.roles.role-show');
    }
}
