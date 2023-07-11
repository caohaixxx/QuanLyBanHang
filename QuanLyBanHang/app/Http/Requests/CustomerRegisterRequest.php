<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
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
            'cusemail' => 'required|email',
            'cusphone' => 'required|digits_between:10,11',
            'cuspassword' => 'required|min:6|max:255',
            'cusname' => 'required|min:1|max:255',
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
            'cusphone.required' => 'Số điện thoại không được để trống',
            'cusphone.digits_between' => 'Vui lòng nhập SĐT từ 10 đến 11 chữ số!',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu chỉ được tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 255 ký tự',
            'cusemail.required' => 'Email không được để trống',
            'cusemail.email' => 'Phải là định dạng email',
            'cuspassword.required' => 'Mật khẩu không được để trống',
            'cusname.required' => 'Tên người dùng không được để trống',
            'cusname.max' => 'Tên người dùng chỉ được tối đa 200 ký tự',
            'cusname.min' => 'Tên người dùng chỉ được tối thiểu 1 ký tự',
        ];
    }
}
