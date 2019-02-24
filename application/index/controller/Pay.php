<?php
namespace app\index\controller;
use think\Db;
use think\Session;
use think\Cookie;
use app\index\controller\Base;

class Pay extends Base
{
    public function index()
    {
        
        
        return $this->fetch('pay');
    }
    public function lang()
    {
        $user_email = input('user_email');
        dump($user_email);die;
        return $this->fetch('pay');
    }
    public function pay()
    {
        if(request()->ispost())
        {
            $user_email = input('user_email');
            $active_code = md5(time());
            cookie(null, 'think_');
            Cookie::set('paypal_user_email',$user_email,3600);
            Cookie::set('user_active_code',$active_code,3600);
           
                $content="<a href='http://tp5.com/public/index.php/index/Checkemail/check/?user_active_code=".(Cookie::get('user_active_code'))."&email=".$user_email."'>您的验证码为：".(Cookie::get('user_active_code'))."点击我完成验证！</a>";
                $email_status = sendMail($user_email,"VideoeasySoft",$content);
                return $this->success('邮件已经发送，请及时完成验证');
            
        }
    }
    

    
}
