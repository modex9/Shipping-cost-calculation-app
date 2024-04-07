<?php

namespace App\Strategy\ShipmentDataFormat;

use App\Contracts\ShipmentDataFormatContract;
use App\Models\Shipment;

class CarCarrierFormat implements ShipmentDataFormatContract  {
    public function formatShipmentData(Shipment $shipment): string {

        return $shipment->num_cars . " aut; " . $shipment->distance . "km";
    }
}
