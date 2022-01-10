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
            'description' => 'nullable|max:500|',
            'image' => 'required|mimes:png,jpg',
            'status' => 'required',
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
            'status.required' => 'The status is required field',
        ];
    }
}
