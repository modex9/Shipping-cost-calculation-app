<?php

namespace App\Services;

use App\Contracts\ShippingCalculationContract;
use App\Models\Shipment;


class ShippingPriceCalculationService
{
    private ShippingCalculationContract $shippingCalculationMethod;

    public function setShippingCalculationMethod(ShippingCalculationContract $shippingCalculationMethod) {
        $this->shippingCalculationMethod = $shippingCalculationMethod;
    }

    public function calculateShippingPrice(Shipment $shipment) {
        $price = $this->shippingCalculationMethod->calculateShippingPrice($shipment);
        $shipment->price = $price;
        $shipment->save();
    }
}
