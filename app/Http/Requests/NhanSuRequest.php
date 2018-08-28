<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanSuRequest extends FormRequest
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
            'id' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages(){
        return [
            'id.required' => 'Trường này không được để trống',
            'name.required' => 'Trường này không được để trống',
            'birthday.required' => 'Trường này không được để trống',
            'sex.required' => 'Trường này không được để trống',
            'address.required' => 'Trường này không được để trống',
            'phone.required' => 'Trường này không được để trống',
            'email.required' => 'Trường này không được để trống',
            'email.email' => 'Email không hợp lệ',
        ];   
    }
}
