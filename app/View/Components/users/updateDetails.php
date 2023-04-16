<?php

namespace App\View\Components\users;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class updateDetails extends Component
{

    public $user, $roles, $rolesIds;
    /**
     * Create a new component instance.
     */
    public function __construct($user, $roles, $rolesIds)
    {
        $this->user = $user;
        $this->rolesIds = $rolesIds;
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users.update-details');
    }
}
