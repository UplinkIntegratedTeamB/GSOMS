<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
            'name' => 'required|max:50|unique:suppliers,name',
            'control_no' => 'required',
            'org_type' => 'required',
            'expiration_date' => 'required',
            'class_type_id' => 'required',
            'address' => 'required',
            'doc_submitted' => 'nullable',
            'other_info' => 'required',
        ];
    }
}
