<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6|max:255',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu chỉ được tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 255 ký tự',
            'cusemail.required' => 'Email không được để trống',
            'cusemail.email' => 'Phải là định dạng email',
            'cuspassword.required' => 'Mật khẩu không được để trống',
        ];
    }
}
