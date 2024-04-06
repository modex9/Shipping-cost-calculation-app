<?php

namespace App\Http\Controllers;

use App\Services\ShippingPriceCalculationService;
use App\Http\Requests\CalculateShippingRequest;

class TransportCalculationController extends Controller
{
    public function calculateTransportPrice(CalculateShippingRequest $request, ShippingPriceCalculationService $shippingPriceCalculationService)
    {
        $transportDepartment = $request->input('transport_department');
        if($transportDepartment == 'car_carrier') {

        }
        elseif($transportDepartment == 'cargo_truck') {

        }
        else {
            return [
                'errors' => ['Nepasirinktas transporto skyrius'],
            ];
        }
    }
}
