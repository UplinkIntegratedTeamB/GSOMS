<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBiddingPO extends FormRequest
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
            'request_detail_id' => 'required|exists:request_details,id',
            'po_no' => 'nullable',
            'payment_term' => 'required',
            'confirm_date' => 'required',
            'delivery_date' => 'required',
            'no_of_days' => 'required',
            'delivery_term' => 'required'
        ];
    }
}
