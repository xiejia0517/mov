<?php
namespace app\admin\validate;
use think\Validate;

class Article extends Validate
{
    //自定义验证规格
    // protected $rule = [
    //     'user_name' => 'require|min:1|max:25|unique:user',
    //     'user_password' => 'require|max:34',
    // ];
    // //自定义错误信息
    // protected $message = [
    //     'user_name.require' => '用户名不能为空',
    //     'user_name.min' => '用户名不能少于6个字符',
    //     'user_name.max' => '用户名不能超过25个字符',

    //     'password.require' => '密码不能为空',
    //     'user_password.max' => '密码不能超过34个字符',
    // ];
    // //自定义验证场景
    // protected $scene = [
    //     //'add' => ['username'=>'require','password'],
    //     'add' => ['user_name','user_password'],
    //     //'edit' => ['username'],
    // ];
}
