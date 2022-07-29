<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'slug' => 'required',
            'images' => 'required|image|mimes:png,jpg,jpeg|max:2028',
            'status' => 'nullable',
            'maincategories_id' => 'required'
            ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter your category name',
            'desc.required' => 'Please enter your categor Description name',
            'images.required' => 'Please upload categor image',
            'maincategories_id.required' => 'Please choose Main Catgory',
        ];
    }
}
