<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
            ],
            'slug' => [
                'required',
                'string',
            ],
            'category_id' => [
                'required',
            ],
            'description' => [
                'required',
                'string',
            ],
            'time' => [
                'required',
                'string',
            ],
            'vehicle' => [
                'required',
                'string',
            ],
            'starting_point' => [
                'required',
                'string',
            ],
            'destination' => [
                'required',
                'string',
            ],
            'tour' => [
                'required',
                'string',
            ],
            'tour_policy' => [
                'required',
                'string',
            ],
            'image' => [
                'required',
                'file',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}