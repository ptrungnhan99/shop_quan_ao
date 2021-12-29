<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerPost extends FormRequest
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
            'ten_banner' => 'required',
            'tieu_de' => 'required',
            'hinh' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'ten_banner.required' => 'Vui lòng nhập tên Banner',
            'tieu_de.required' => 'Vui lòng nhập tiêu đề',
            'mimes' => 'Chỉ chọn file hình ảnh',
            'hinh.required' => 'Vui lòng chọn hình ảnh'
        ];
    }
    public function attributes()
    {
        return [
            'ten_banner' => 'Tên banner',
            'tieu_de' => 'Tiêu đề',
            'hinh' => 'Hình'
        ];
    }
}
