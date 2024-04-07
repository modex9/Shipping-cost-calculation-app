<?php

namespace App\Contracts;

use App\Models\Shipment;

interface ShippingCalculationContract {
    public function calculateShippingPrice(Shipment $shipment) : float;
}
