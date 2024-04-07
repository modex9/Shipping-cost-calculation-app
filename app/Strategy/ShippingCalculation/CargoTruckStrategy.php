<?php

namespace App\Strategy\ShippingCalculation;

use App\Contracts\ShippingCalculationContract;
use App\Models\Shipment;

class CargoTruckStrategy implements ShippingCalculationContract  {

    const BASE_KM_RATE = 0.5;
    const DANGEROUS_KM_RATE = 0.8;

    public function calculateShippingPrice(Shipment $shipment): float {
        if($shipment->fragile_goods) {
            return self::DANGEROUS_KM_RATE * ($shipment->distance + $shipment->cargo_weight);
        }
        return self::BASE_KM_RATE * ($shipment->distance + $shipment->cargo_weight);
    }
}
