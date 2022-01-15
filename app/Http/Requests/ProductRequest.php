<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required|max:500|',
            'image' => 'required|mimes:png,jpg',
            'status' => 'required|integer',
            'brand_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The product name is required field',
            'price.required' => 'The product price is required field',
            'description.required' => 'The description field is required',
            'image:mimes' => 'The product image should be in correct format',
            'image.required' => 'The product image is required field',
            'status.integer' => 'Please select a status',
            'brand_id.integer' => 'Please select a brand',
        ];
    }
}
