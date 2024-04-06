<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateShippingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'transport_department' => 'required',
            'cargo_weight' => 'required_if:transport_department,cargo_truck|gte:500',
            'distance' => 'required|gt:0',
            'num_cars' => 'required_if:transport_department,car_carrier|integer|min:1|max:8',
            'fragile_goods' => 'required_if:transport_department,cargo_truck|boolean',
        ];
    }

    public function messages() {
        return [
            'transport_department.required' => 'Nepasirinktas transporto skyrius.',
            'cargo_weight.gte' => 'Krovinio svoris turi būti ne mažiau 500 kg.',
            'cargo_weight.required_if' => 'Krovinio svoris turi būti ne mažiau 500 kg.',
            'num_cars.min' => 'Automobilių kiekis negali būti mažesnis kaip 1.',
            'num_cars.max' => 'Automobilių kiekis negali viršyti 8.',
            'num_cars.integer' => 'Nenurodytas automobilių kiekis.',
            'num_cars.required_if' => 'Nenurodytas automobilių kiekis.',
            'distance.required' => 'Nenurodytas atstumas.',
            'distance.gt' => 'Atstumas turi būti didesnis už 0.',
            'fragile_goods.boolean' => 'Pažymėkite, ar tai pavojingas krovinys.',
            'fragile_goods.required_if' => 'Pažymėkite, ar tai pavojingas krovinys.',
        ];
    }
}
