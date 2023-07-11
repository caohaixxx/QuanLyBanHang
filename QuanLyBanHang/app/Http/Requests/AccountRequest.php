<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'phone' => 'required|digits_between:10,11',
            'full_name' => 'required|min:1|max:255',
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
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.digits_between' => 'Vui lòng nhập SĐT từ 10 đến 11 chữ số!',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Phải là định dạng email',
            'full_name.required' => 'Tên người dùng không được để trống',
            'full_name.max' => 'Tên người dùng chỉ được tối đa 200 ký tự',
            'full_name.min' => 'Tên người dùng chỉ được tối thiểu 1 ký tự',
        ];
    }
}
