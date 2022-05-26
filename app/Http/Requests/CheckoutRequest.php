<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'twitter' => 'required',
            'discord' => 'required',
            'instagram' => 'nullable',
            'image' => 'nullable',
            'message' => 'nullable',


        ];
    }

    public function messages()
    {
       return [
           'name.required' => 'You must have name',
           'email.required' => 'You must have email',
           'phone.required' => 'You must have phone number',
           'amount.required' => 'You must have amount and it must be digit',
           'twitter.required' => 'You must provide twitter handle url',
           'discord.required' => 'You must provide discord handle url',
           'image.required' => 'You must provide related art image',
       ];
    }
}
