<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Admin;
class Login extends Controller
{
    public function index()
    {
        if(request()->isPost())
        {
            $admin = new Admin();
            $data = input('post.');
            $returnNum = $admin->login($data);
            if($returnNum == 0)
            {
                $this->error('验证码不正确!');
            }
            else if ($returnNum == 3)
            {
                $this-> success('登陆成功,跳转中....','index/index');
            }else
            {
                $this->error('用户名或密码不正确!');
            }
        }
        return $this->fetch();
        
    }
}
