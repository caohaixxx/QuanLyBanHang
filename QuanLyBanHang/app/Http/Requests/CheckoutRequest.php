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
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:200|min:1',
            'phone' => 'required|digits_between:10,11',
            'email' => 'required|email',
            'city' => 'required',
            'district' => 'required',
            'wards' => 'required',
            'address' => 'required|max:100',
        ];
    }
}
