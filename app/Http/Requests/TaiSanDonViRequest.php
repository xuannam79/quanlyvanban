<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaiSanDonViRequest extends FormRequest
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
            'TenTaiSan' => 'required',
            'DonViTiepNhan' => 'required',
            'SoLuong' => 'required',
            'GhiChu' => 'required',
        ];
    }
    public function messages(){
        return [
            'TenTaiSan.required' => 'Chưa nhập tên tài sản',
            'DonViTiepNhan.required' => 'Chưa chọn đơn vị tiếp nhận',
            'SoLuong.required' => 'Chưa nhập số lượng',
            'GhiChu.required' => 'Chưa ghi chú',
        ];   
    }
}
