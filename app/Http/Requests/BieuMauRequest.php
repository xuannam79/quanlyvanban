<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BieuMauRequest extends FormRequest
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
            'TenBieuMau' => 'required',
            'NgayBanHanh' => 'required',
            'NgayGui' => 'required',
            'TrichYeuNoiDung' => 'required',
            'FileDinhKem' => 'required',
        ];
    }
    public function messages(){
        return [
            'TenBieuMau.required' => 'Trường này không được để trống',
            'NgayBanHanh.required' => 'Trường này không được để trống',
            'NgayGui.required' => 'Trường này không được để trống',
            'TrichYeuNoiDung.required' => 'Trường này không được để trống',
            'FileDinhKem.required' => 'Hãy chọn file đính kèm',
        ];   
    }
}
