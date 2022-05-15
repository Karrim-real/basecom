<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
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
            'user_id' => 'nullable|numeric',
            'prod_id' => 'required|numeric',
            'prod_qty' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'user_id' => 'Please Login to add product cart',
            'prod_id' => 'Please choose a product to add to cart',
            'prod_qty' => 'Please provide quantity product needs'
        ];
    }
}
