<?php
namespace app\index\controller;
use think\Db;
use think\Session;
use think\Cookie;
use app\index\controller\Base;

class Checkemail extends Base
{
    public function check()
    {
        if(request()->isget())
        {
            $userinfo = $_GET;
            // 对比数据库进行验证
            $a_code = Cookie::get('user_active_code');
            $u_email = Cookie::get('paypal_user_email');
            if($a_code == $userinfo['user_active_code'])
            {
                    return $this->success('验证成功，继续购买','paypal/index'); 
            }
            else
            {
                return $this->error('验证失败，重新购买','pay/index');
            }
        }
    }
    
}
