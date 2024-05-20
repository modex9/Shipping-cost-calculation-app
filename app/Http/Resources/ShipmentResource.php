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
            'id' => $this->id,
            'transport_department' => ShippingTypes::tryFrom($this->transport_department)->translated(),
            'num_cars' => $this->num_cars,
            'cargoData' => $this->whenHas('cargoData'),
            'cargo_weight' => $this->cargo_weight,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}
