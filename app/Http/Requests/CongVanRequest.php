<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CongVanRequest extends FormRequest
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
            "SoCongVan"=>"required",
            "NgayBanHanh"=>"required",
            "NgayHetHieuLuc"=>"required",
            "TrichYeuNoiDung"=>"required",
            "FileDinhKem"=>"required",
            "LoaiGui"=>"required",
        ];
    }
    public function messages(){
        return [
            'SoCongVan.required' => 'Trường này không được để trống',
            'NgayBanHanh.required' => 'Trường này không được để trống',
            'NgayHetHieuLuc.required' => 'Trường này không được để trống',
            'TrichYeuNoiDung.required' => 'Trường này không được để trống',
            'FileDinhKem.required' => 'Vui lòng chọn file đính kèm cho công văn',
            'LoaiGui.required' => 'vui lòng chọn loại gửi',
        ];
    }
}
