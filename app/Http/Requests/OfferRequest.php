<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|max:100|unique:offers,name_ar',
            'name_en' => 'required|string|max:100|unique:offers,name_en',
            'price' => 'required|numeric|min:0',
            'details_ar' => 'required|string|max:1000',
            'details_en' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => __('messages.required'),
            'name_ar.string' => 'Offer name must be string',
            'name_ar.max' => 'Offer name must be less than 100 characters',
            'name_ar.unique' => 'Offer name must be unique',
            'price.required' => __('messages.required'),
            'price.numeric'=> 'Offer price must be numeric',
            'price.min' => 'Offer price must be greater than 0',
            'details_ar.required' =>__('messages.required'),
            'details.string'=> 'Offer details must be string',
            'details.max' => 'Offer details must be less than 1000 characters',
        ];

    }
}