<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'department_id' => 'exists:departments,id|required',
            'name' => 'required|max:255',
            'email' => 'email|unique:users,email',
            'password' => 'required|max:255',
            'role_id' => 'required',
        ];
    }
}
