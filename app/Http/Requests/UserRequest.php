<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:10|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:255',
            'password' => 'required|min:7|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'You mustr provide name',
            'email.required' => 'You mustr provide email',
            'phone.required' => 'You mustr provide email',
            'password.required' => 'You mustr provide password',
        ];

    }
    public function attributes()
    {
        return [
            'email' => 'Email must be Valid email Address'
        ];

    }
}
