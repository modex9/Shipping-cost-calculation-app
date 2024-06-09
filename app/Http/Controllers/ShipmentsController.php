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
        $shipments = Shipment::query()->latest()->get();
        foreach($shipments as $shipment) {
            $shipment->cargoData = $shippingDataFormatService->format($shipment);
        }
        return Inertia::render('ShipmentsApp', [
            'shipments' => ShipmentResource::collection($shipments),
        ]);
    }
}
