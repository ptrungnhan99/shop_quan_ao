<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSanPhamPost extends FormRequest
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
            'ten_sp' => 'required',
            'ma_loai' => 'required',
            'ma_thuong_hieu' => 'required',
            'mo_ta_tom_tat' => 'required',
            'chi_tiet' => 'required',
            'gia' => 'required',
            'hinh1' => 'required|mimes:png,jpg,jpeg|max:2048',
            'hinh2' => 'required|mimes:png,jpg,jpeg|max:2048',
            'hinh3' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'ten_sp.required' => 'Vui lòng nhập tên Sản phẩm',
            'ma_loai.required' => 'Vui lòng chọn loại sản phẩm',
            'ma_thuong_hieu.required' => 'Vui lòng chọn thương hiệu',
            'mo_ta_tom_tat.required' => 'Vui lòng nhập mô tả tóm tắt',
            'chi_tiet.required' => 'Vui lòng nhập chi tiết',
            'gia.required' => 'Vui lòng nhập giá',
            'mimes' => 'Chỉ chọn file hình ảnh',
            'hinh1.required' => 'Vui lòng chọn hình ảnh',
            'hinh2.required' => 'Vui lòng chọn hình ảnh',
            'hinh3.required' => 'Vui lòng chọn hình ảnh'
        ];
    }
    public function attributes()
    {
        return [
            'ten_sp' => 'Tên Sản phẩm',
            'ma_loai' => 'Mã loại',
            'ma_thuong_hieu' => 'Mã thương hiệu',
            'mo_ta_tom_tat' => 'Mô tả tóm tắt',
            'chi_tiet' => 'Chi tiết',
            'gia' => 'Giá',
            'hinh1' => 'Hình',
            'hinh2' => 'Hình',
            'hinh3' => 'Hình'
        ];
    }
}
