<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return [
            'department_id' => 'required|max:50',
            'division' => 'max:50|nullable',
            'section' => 'max:50|nullable',
            'requested_by' => 'required|max:50',
            'evaluated_by' => 'required|max:50',
            'procurement_mode_id' => 'required',
            'date1' => 'max:50|nullable|date',
            'ppmp_no' => 'nullable',
            'purpose' => 'max:255|required',
            'region' => 'max:50|nullable',
            'sof' => 'max:50|nullable',
            'euo' => 'max:50|required',
            'user_id' => 'min:1',
            'items' => 'required|array',
            'items. * .unit_price' => 'required',
            'items. * .item_id' => 'required|numeric|min:1',
            'items. * .description' => 'required|max:255',
            'items. * .quantity' => 'required|numeric|min:1',
            'items. * .estimated_cost' => 'required|numeric',
            'grand_total' => 'required|numeric|min:1'
        ];
    }
}
