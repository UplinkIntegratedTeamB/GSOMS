<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBidInvitationRequest extends FormRequest
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
            'issuance_of_bid' => 'required|date',
            'start' => 'required|date',
            'until' => 'required|date',
            'opening_of_bids' => 'required|date',
            'bid_evaluation' => 'required|date',
            'post_qualification' => 'required|date',
            'notice_of_award' => 'required|date',
            'day' => 'required|numeric',
            'pre_procurement' => 'nullable|date',
            'pre_bid' => 'nullable|date',
        ];
    }
}
