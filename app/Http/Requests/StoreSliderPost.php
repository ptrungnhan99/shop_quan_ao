<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderPost extends FormRequest
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
            'ten_slider' => 'required',
            'tieu_de' => 'required',
            'hinh' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'ten_slider.required' => 'Vui lòng nhập tên Slider',
            'tieu_de.required' => 'Vui lòng nhập tiêu đề',
            'mimes' => 'Chỉ chọn file hình ảnh',
            'hinh.required' => 'Vui lòng chọn hình ảnh'
        ];
    }
    public function attributes()
    {
        return [
            'ten_slider' => 'Tên slider',
            'tieu_de' => 'Tiêu đề',
            'hinh' => 'Hình'
        ];
    }
}
