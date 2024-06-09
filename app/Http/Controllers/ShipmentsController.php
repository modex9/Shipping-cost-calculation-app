<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;
use App\Services\PerPageService;
use App\Services\ShippingDataFormatService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ShippingDataFormatService $shippingDataFormatService, PerPageService $perPageService) : Response
    {
        $shipments = Shipment::query()->latest()->paginate($perPageService->getPerPage($request));
        foreach($shipments as $shipment) {
            $shipment->cargoData = $shippingDataFormatService->format($shipment);
        }
        return Inertia::render('ShipmentsApp', [
            'shipments' => ShipmentResource::collection($shipments),
            'paginationLinks' => $shipments->links()->toHtml()
        ]);
    }
}
