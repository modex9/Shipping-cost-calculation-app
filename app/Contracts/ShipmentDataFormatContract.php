<?php

namespace App\Contracts;

use App\Models\Shipment;

interface ShipmentDataFormatContract {
    public function formatShipmentData(Shipment $shipment) : string;
}
