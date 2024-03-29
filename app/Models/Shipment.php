<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded =[];

    public function goods()
    {
        return $this->hasMany(ShipmentGoods::class);
    }

    public function shipmentData()
    {
        return $this->hasOne(ShipmentData::class);
    }
}
