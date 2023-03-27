<?php

namespace App\View\Components\users;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class addUser extends Component
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
        return view('components.users.add-user');
    }
}
