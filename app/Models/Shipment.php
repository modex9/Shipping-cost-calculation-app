<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ShippingTypes;
class Shipment extends Model {
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
