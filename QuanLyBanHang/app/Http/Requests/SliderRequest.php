<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class SliderRequest extends FormRequest
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
        $rules =  [
            'name' => 'required|max:200|min:6',
            'status' => 'required',
        ];
        if(Route::is('admin.slider.store')){
            $rules['image'] = 'required|image';
        }
        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên thương hiệu không được phép để trống',
            'name.max' => 'Tên thương hiệu chỉ được tối đa 200 ký tự',
            'name.min' => 'Tên thương hiệu chỉ được tối thiểu 6 ký tự',
            'image.required' => 'Ảnh không được phép bỏ trống',
            'image.mimes' => 'Ảnh phải có định dạng jpeg,jpg,png,gif',
            'status.required' => 'Vui lòng chọn trạng thái',
        ];
    }
}
