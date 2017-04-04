<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;

class ClassesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *是否是需要进行身份验证
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
            'title'=>'required',
            'is_top_menu'=>'required|in:0,1',
            'parent_id'=>'numeric',
            'slug'=>'required|unique:class,slug',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'标题必须填。',
            'is_top_menu.required'=>'请确认是不是顶层菜单。',
            'slug.required'=>'slug必须填写.'
        ];
    }

}
