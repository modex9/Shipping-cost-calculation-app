<?php

namespace App\Strategy\ShippingCalculation;

use App\Contracts\ShippingCalculationContract;
use App\Models\Shipment;

class CarCarrierStrategy implements ShippingCalculationContract  {
    const STARTING_PRICE = 1;
    const PRICE_CHANGE_PER_CAR = -0.05;
    public function calculateShippingPrice(Shipment $shipment): float {
        $numCars = $shipment->num_cars;
        $distance = $shipment->distance;

        // using arithmetic progression
        $lastCarPrice = self::STARTING_PRICE + ($numCars - 1) * self::PRICE_CHANGE_PER_CAR;
        $sumPriceAllCars = ($numCars * (self::STARTING_PRICE + $lastCarPrice)) / 2;

        return $sumPriceAllCars * $distance;
    }
}
