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
        'title' => 'required',
        'desc' => 'required',
        'category_id' => 'required',
        'prod_qty' => 'required|numeric',
        'selling_price' => 'required|numeric',
        'discount_price' => 'required|numeric',
        'slug' => 'required',
        'image' => 'required|image|mimes:png,jpg,jpeg|max:2028',
        'status' => 'nullable',
        'user_id' => 'required'

        ];
    }

    public function messages()
    {
        return [
        'title.required' => 'Please enter your product title',
        'desc.required' => 'Please enter your product description',
        'category_id.required' => 'Please choose a product category',
        'prod_qty.required' => 'Please provide a product quantity',
        'selling_price.required' => 'Please enter selling price',
        'discount_price.required' => 'Please enter discount price',
        'slug.required' => 'Please enter your product slug',
        'images.required' => 'Please upload a product images',
        ];
    }
}
