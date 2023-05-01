<?php

namespace App\Console\Commands;

use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckShipmentDeliveryDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:check-shipment-delivery-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Shipments Delivery Date';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $shipments = Shipment::where('status', 'in-progress')->get();
        foreach($shipments as $shipment){
            $delivery_date = Carbon::parse($shipment->delivery_date)->toDateString();
            if($delivery_date <= Carbon::now()){
                $shipment->update([
                    'status'=> 'not-delivered',
                ]);
            }
        }
    }
}
