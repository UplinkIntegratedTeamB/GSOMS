<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbstractRequest extends FormRequest
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
            'winner' => 'nullable',
            'supplier_id' => 'required|exists:suppliers,id',
            'inventory' => 'required|array',
            'inventory. * .quantity' => 'required',
            'inventory. * .offer_price' => 'required',
            'inventory. * .total_amt' => 'required'
        ];
    }
}
