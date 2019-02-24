<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{
    //自定义验证规格
    protected $rule = [
        'username' => 'require|min:1|max:25|unique:admin',
        'password' => 'require|max:34',
    ];
    //自定义错误信息
    protected $message = [
        'username.require' => '用户名不能为空',
        'username.min' => '用户名不能少于6个字符',
        'username.max' => '用户名不能超过25个字符',
        'username.unique' => '此管理员已存在',

        'password.require' => '密码不能为空',
        'password.max' => '密码不能超过34个字符',
    ];
    //自定义验证场景
    protected $scene = [
        //'add' => ['username'=>'require','password'],
        'add' => ['username','password'],
        'edit' => ['username','password'],
        //'edit' => ['username'],
    ];
}
