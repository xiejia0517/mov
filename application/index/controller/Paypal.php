<?php
namespace app\index\controller;
use think\Db;
use think\Session;
use think\Cookie;
use app\index\controller\Base;

class Paypal extends Base
{
    public function index()
    {
        
        // if($user_email)
        // {
        //     return $this->redirect('www.baidu.com');
        // }
        return $this->fetch('paypal');
    }
    
    
}
