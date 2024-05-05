<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Services\ShippingDataFormatService;
use App\Strategy\ShipmentDataFormat\CarCarrierFormat;
use App\Strategy\ShipmentDataFormat\CargoTruckFormat;
use App\Enums\ShippingTypes;

use Inertia\Inertia;
use Inertia\Response;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(ShippingDataFormatService $shippingDataFormatService)
    // {
    //     $shipments = Shipment::all();
    //     foreach($shipments as $shipment) {
    //         if($shipment->transport_department == ShippingTypes::CAR_CARRIER->value) {
    //             $shippingDataFormatService->setShipmentFormat(new CarCarrierFormat());
    //         }
    //         elseif($shipment->transport_department == ShippingTypes::CARGO_TRUCK->value) {
    //             $shippingDataFormatService->setShipmentFormat(new CargoTruckFormat());
    //         }
    //         $shipment->transport_department = ShippingTypes::tryFrom($shipment->transport_department)->translated();
    //         $shipment->cargoData = $shippingDataFormatService->format($shipment);

    //     }
    //     return response()->json($shipments);
    // }

    public function index() : Response
    {
        return Inertia::render('Shipment', [
            'shipments' => Shipment::all(),
        ]);
    }
}
