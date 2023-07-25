<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBiddingSupplier extends FormRequest
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
            'winner' => 'nullable|exists:suppliers,id',
            'purpose' => 'nullalbe',
            'supplier_id' => 'required|exists:suppliers,id',
            'inventory' => 'required|array',
            'inventory. * .quantity' => 'required|min:1',
            'inventory. * .offer_price' => 'required|min:1',
            'inventory. * .total_amt' => 'required|min:1'
        ];
    }
}
