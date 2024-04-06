<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShippingPriceCalculationService;

class TransportCalculationController extends Controller
{
    public function calculateTransportPrice(Request $request, ShippingPriceCalculationService $shippingPriceCalculationService)
    {
        $transportDepartment = $request->input('transport_department');
        if($transportDepartment == 'car_carrier') {

        }
        elseif($transportDepartment == 'cargo_truck') {

        }
        else {

        }
    }
}
