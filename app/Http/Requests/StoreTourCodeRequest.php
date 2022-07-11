<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => [
                'required',
            ],
            'tour_code' => [
                // 'required',
                'string',
            ],
            'start' => [
                'required',
                'string',
            ],
            'price_adult' => [
                'required',
                'string',
            ],
            'price_children' => [
                'required',
                'string',
            ],
            'price_baby' => [
                'required',
                'string',
            ],
        ];
    }
}