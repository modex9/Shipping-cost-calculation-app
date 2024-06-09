<?php

namespace App\Http\Controllers;

use App\Services\ShippingPriceCalculationService;
use App\Services\ShipmentCreationService;
use App\Http\Requests\CalculateShippingRequest;
use App\Strategy\ShippingCalculation\CarCarrierStrategy;
use App\Strategy\ShippingCalculation\CargoTruckStrategy;

class TransportCalculationController extends Controller
{
    public function calculateTransportPrice(CalculateShippingRequest $request, ShippingPriceCalculationService $shippingPriceCalculationService, ShipmentCreationService $shipmentCreationService)
    {
        $shipment = $shipmentCreationService->createShipment($request);
        $transportDepartment = $request->input('transport_department');
        if ($transportDepartment == 'car_carrier') {
            $shippingPriceCalculationService->setShippingCalculationMethod(new CarCarrierStrategy());
        } elseif ($transportDepartment == 'cargo_truck') {
            $shippingPriceCalculationService->setShippingCalculationMethod(new CargoTruckStrategy());
        }
        $shippingPriceCalculationService->calculateShippingPrice($shipment);

        return back();
    }
}
