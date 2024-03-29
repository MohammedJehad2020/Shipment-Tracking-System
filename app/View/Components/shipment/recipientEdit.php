<?php

namespace App\View\Components\shipment;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class recipientEdit extends Component
{
    public $shipment;
    /**
     * Create a new component instance.
     */
    public function __construct($shipment)
    {
        $this->shipment = $shipment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shipment.recipient-edit');
    }
}
