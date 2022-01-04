<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTinTucPost extends FormRequest
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
            'tieu_de' => 'required',
            'tom_tat' => 'required',
            'chi_tiet' => 'required',
            'tac_gia' => 'required',
            'hinh' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'tom_tat.required' => 'Vui lòng nhập mô tả tóm tắt',
            'tieu_de.required' => 'Vui lòng nhập tiêu đề',
            'chi_tiet.required' => 'Vui lòng nhập chi tiết',
            'tac_gia.required' => 'Vui lòng nhập tên tác giả',
            'mimes' => 'Chỉ chọn file hình ảnh',
            'hinh.required' => 'Vui lòng chọn hình ảnh'
        ];
    }
    public function attributes()
    {
        return [
            'tom_tat' => 'Mô tả tóm tắt',
            'chi_tiet' => 'Chi tiết',
            'tac_gia' => 'Tác giả',
            'tieu_de' => 'Tiêu đề',
            'hinh' => 'Hình'
        ];
    }
}
