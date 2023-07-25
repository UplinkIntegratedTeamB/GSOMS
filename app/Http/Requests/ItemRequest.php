<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'category_id' => 'max:50',
            'description' => 'required|max:255',
            'item_type_id' => 'required|max:255',
            'unit_id' => 'required|max:255',
            'unit_price' => 'required|max:255',
            'quantity' => 'max:50',
        ];
    }
}
