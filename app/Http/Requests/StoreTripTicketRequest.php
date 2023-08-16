<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripTicketRequest extends FormRequest
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
            'department_id' => 'required|exists:departments,id',
            'division_id' => 'nullable|exists:divisions,id',
            'item_id' => 'required|exists:items,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'month_id' => 'required|exists:months,id',
            'driver' => 'required|string|max:255',
            'passenger' => 'nullable|string|max:255',
            'gas_type' => 'required',
            'place_to_visit' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'amount' => 'nullable',
            'oil_issued' => 'nullable',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }
}
