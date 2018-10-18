<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserinsert extends FormRequest
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
            //会员名做规则设置
            'username'=>'required|regex:/\w{4,8}/|unique:user',
            //密码和重复密码
            'password'=>'required',
            'repassword'=>'required|same:password',
            'email'=>'required',
            'phone'=>'required'
        ];
    }
    //自定义错误消息
    public function messages(){
        return [
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名必须为4-8为任意的字母数字下划线组成',
            'username.unique'=>'用户名已存在',
            'password.required'=>'密码不能为空',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'两次密码不一致',
            'email.required'=>'邮箱不能为空',
            'phone.required'=>'电话不能为空'
        ];
    }
}
