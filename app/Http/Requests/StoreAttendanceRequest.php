<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
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
            'bac_chairman' => 'required',
            'bac_vc' => 'required',
            'secretariat' => 'required',
            'member_1' => 'required',
            'member_2' => 'required',
            'member_3' => 'required',
            'member_4' => 'required',
            'member_5' => 'required',
        ];
    }
}
