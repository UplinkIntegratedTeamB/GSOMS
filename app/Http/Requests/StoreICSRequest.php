<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreICSRequest extends FormRequest
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
            'serial_number' => 'required',
            'fund_cluster' => 'required',
            'usefel_life' => 'required',
        ];
    }
}
