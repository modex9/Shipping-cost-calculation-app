<?php

namespace App\Enums;

enum ShippingTypes : string {
    case CAR_CARRIER = 'car_carrier';
    case CARGO_TRUCK = 'cargo_truck';

    public function translated(): string
    {
        return match($this) {
            self::CAR_CARRIER => 'Autovežis',
            self::CARGO_TRUCK => 'Vilkikas su tentine priekaba',
        };
    }
}
