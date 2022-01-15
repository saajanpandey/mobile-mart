<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberValidation;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address' => 'required|string|max:255',
            'cellphone_number' => ['required', 'numeric', new PhoneNumberValidation()],
            'payment_method' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'payment_method.integer' => 'Please select a payment method.',
        ];
    }
}
