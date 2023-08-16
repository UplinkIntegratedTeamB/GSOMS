<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => 'required|numeric',
            'engine_no' => 'required|string|max:255',
            'chasis_no' => 'required|string|max:255',
            'body_color' => 'required|string|max:255',
            'new_donation' => 'required|numeric',
            'make_type_body' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|string',
            'weight' => 'required|string',
            'lto_start' => 'required|date',
            'lto_until' => 'required|date',
            'gsis' => 'required|date',
            'plate_no' => 'required|string|max:255'
        ];
    }
}
