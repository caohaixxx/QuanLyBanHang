<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class CategoriesRequest extends FormRequest
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
            'slug' => 'required|max:100|min:6',
        ];
        if(Route::is('admin.brand.store')){
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
            'name.required' => 'Tên danh mục không được phép để trống',
            'name.max' => 'Tên danh mục chỉ được tối đa 200 ký tự',
            'name.min' => 'Tên danh mục chỉ được tối thiểu 6 ký tự',
            'image.required' => 'Ảnh không được phép bỏ trống',
            'image.max' => 'Ảnh không quá 3MB',
            'image.mimes' => 'Ảnh phải có định dạng jpeg,jpg,png,gif',
            'slug.required' => 'Slug không được phép để trống',
            'slug.max' => 'Slug chỉ được tối đa 200 ký tự',
            'slug.min' => 'Slug chỉ được tối thiểu 6 ký tự',
        ];
    }
}
