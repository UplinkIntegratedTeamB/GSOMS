<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class BacResRequest extends FormRequest
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
     *
     */
    public function rules(): array
    {
        return [
            'c_number' => 'nullable',
            'res_title' => 'required',
            'item_details' => 'required',
            'meeting' => 'required',
            'amount_in_words' => 'required',
            'apprv_date' => 'required',
        ];
    }
}
