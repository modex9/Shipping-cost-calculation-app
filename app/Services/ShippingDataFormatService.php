<?php

namespace App\Services;

use App\Models\Shipment;
use App\Contracts\ShipmentDataFormatContract;

class ShippingDataFormatService
{
    private ShipmentDataFormatContract $shippingDataFormatContract;

    public function setShipmentFormat(ShipmentDataFormatContract $shippingDataFormatContract) {
        $this->shippingDataFormatContract = $shippingDataFormatContract;
    }

    public function format(Shipment $shipment) {
        return $this->shippingDataFormatContract->formatShipmentData($shipment);
    }
}
