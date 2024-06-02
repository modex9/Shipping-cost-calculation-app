<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;
use App\Services\ShippingDataFormatService;
use Inertia\Inertia;
use Inertia\Response;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ShippingDataFormatService $shippingDataFormatService) : Response
    {
        $shipments = Shipment::all();
        foreach($shipments as $shipment) {
            $shipment->cargoData = $shippingDataFormatService->format($shipment);
        }
        return Inertia::render('Shipment', [
            'shipments' => ShipmentResource::collection($shipments),
        ]);
    }
}
