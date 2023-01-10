<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
                'name_ar' => 'required|unique:offers',
                'name_en' => 'required|unique:offers',
                'photo' => 'required',
                'price' => 'required|numeric',
                'details_ar' => 'required',
                'details_en' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_ar.required' => 'messages.offer name in ar is required',
            'name_en.required' => 'messages.offer name in en is required',
            'name_ar.unique' =>'messages.offer in ar already exist',
            'name_en.unique' =>'messages.offer in en already exist',
            'photo.required' =>'messages.offer photo is required',
            'price.required' =>'messages.price is required',
            'details_ar.required' =>'messages.details in ar is required',
            'details_en.required' =>'messages.details in en is required',
        ];
    }
}
