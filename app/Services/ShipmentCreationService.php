<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Shipment;

class ShipmentCreationService
{
    public function createShipment(Request $request) : Shipment {
        $shipment = new Shipment();
        $shipment->transport_department = $request->input('transport_department');
        $shipment->distance = $request->input('distance');
        $shipment->num_cars = $request->input('num_cars');
        $shipment->cargo_weight = $request->input('cargo_weight');
        $shipment->fragile_goods = $request->input('fragile_goods');
        $shipment->save();

        return $shipment;
    }
}
