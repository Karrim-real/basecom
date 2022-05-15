<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'images' => 'nullable|image|mimes:png,jpg,jpeg|max:2028',
            'status' => 'nullable',
            ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter your category name',
            'desc.required' => 'Please enter your categor Description name',
        ];
    }
}
