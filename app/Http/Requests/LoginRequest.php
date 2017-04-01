<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     *
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
        //$remember = $this->only('remember');
        return [
            'username' =>'required|min:4|max:20|alpha_dash', //可以包含字母和数字，以及破折号和下划线
            'password' =>'required|min:4|max:32',
            'remember' =>'accepted', //该字段的值必须是yes、on、1或true
        ];
    }

    public function messages()
    {
        return [
            'username.required' =>'用户名必须填写。',
            'username.min' =>'用户名最短4位',
            'username.max' =>'用户名最长20位',
            'username.alpha_dash' =>'用户名可以包含字母数字和下划线',

            'password.required' =>'密码必须填写。',
            'password.min' =>'密码最短4位',
            'password.max' =>'密码最长20位',

            'remember.accepted' =>'该字段的值必须是yes、on、1或true',
        ];
    }
}
