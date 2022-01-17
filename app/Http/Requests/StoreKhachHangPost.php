<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKhachHangPost extends FormRequest
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
            'ho_kh'=>'required',
            'ten_kh'=>'required',
            'dia_chi'=>'required',
            'dien_thoai'=>'required',
            'email'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'ho_kh.required' =>'Vui lòng nhập Họ khách hàng',
            'ten_kh.required' =>'Vui lòng nhập Tên khách hàng',
            'dia_chi.required' =>'Vui lòng nhập Địa chỉ',
            'dien_thoai.required' =>'Vui lòng nhập Điện thoại',
            'email.required' =>'Vui lòng nhập Email'
        ];
    }
}
