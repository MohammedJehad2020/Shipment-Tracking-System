<?php

namespace App\View\Components\fields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class avatar extends Component
{

    public $title, $name, $id;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $name, $id)
    {
       $this->title = $title;
       $this->name = $name;
       $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.avatar');
    }
}
