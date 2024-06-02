<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Enums\ShippingTypes;
use App\Services\ShippingDataFormatService;

class ShipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at->format('Y-m-d'),
            'transport_department' => ShippingTypes::tryFrom($this->transport_department)->translated(),
            'cargoData' => $this->whenHas('cargoData'),
            'price' => $this->price,
            'visible' => true,
        ];
    }
}
