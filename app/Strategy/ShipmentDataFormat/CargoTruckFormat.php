<?php

namespace App\Strategy\ShipmentDataFormat;

use App\Contracts\ShipmentDataFormatContract;
use App\Models\Shipment;

class CargoTruckFormat implements ShipmentDataFormatContract  {
    public function formatShipmentData(Shipment $shipment): string {

        return $shipment->cargo_weight . "kg; " . $shipment->distance . "km" . ($shipment->fragile_goods ? "; Pavojingas" : "");
    }
}
