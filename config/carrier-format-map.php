<?php

use App\Strategy\ShipmentDataFormat\CarCarrierFormat;
use App\Strategy\ShipmentDataFormat\CargoTruckFormat;
use App\Enums\ShippingTypes;

return [
    ShippingTypes::CAR_CARRIER->value => CarCarrierFormat::class,
    ShippingTypes::CARGO_TRUCK->value => CargoTruckFormat::class,
];
