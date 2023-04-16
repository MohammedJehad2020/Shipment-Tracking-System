<?php

namespace App\View\Components\shipment;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class itemsEdit extends Component
{
    public $goods, $shipment, $shipmentGoods;
    /**
     * Create a new component instance.
     */
    public function __construct($goods,$shipment, $shipmentGoods)
    {
        $this->goods = $goods;
        $this->shipment = $shipment;
        $this->shipmentGoods = $shipmentGoods;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shipment.items-edit');
    }
}
