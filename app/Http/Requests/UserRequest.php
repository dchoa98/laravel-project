<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'username' => 'required|regex:/^\w{3,16}$/',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->id)
            ],
            'phone' => [
                'required',
                'regex:/^0[0-9]{9}$/',
                Rule::unique('users')->ignore($this->id)
            ],
            'gender' => 'required|numeric',
            'address'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username không được để trống',
            'username.regex' => 'Username từ 3 đến 16 ký tự gồm chữ và số',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email chưa đúng định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại gồm 10 số',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'gender.required' => 'Giới tính không được để trống',
            'gender.numeric' => 'Kiểu dữ liệu của giới tính được lưu là số',
            'address.required' => 'Địa chỉ không được để trống',
        ];
    }
}
