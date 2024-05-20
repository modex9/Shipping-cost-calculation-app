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
        $shipmentFormatClass = config('carrier-format-map.' . $shipment->transport_department);
        $this->setShipmentFormat(new $shipmentFormatClass());
        return $this->shippingDataFormatContract->formatShipmentData($shipment);
    }
}
