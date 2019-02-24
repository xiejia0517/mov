<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\captcha\Captcha;

class Index extends Base
{
    public function _initialize()
    {
        if(!session('username'))
        {   
            $this->redirect('login/index');
        }
    }
    public function index()
    {
        //echo 'admin模块aaaaaaaaaaaaaaaaaaaaaaaaaaa';
        //sendMail("353449122@qq.com","Xavier","ThinkphpTestEmail","aaaaaaaaaaaaaaaaaaaaaaaaaa");
        return $this->fetch();
        
    }
    // public function getID($id)
    // {
    //     echo $id;
    //         echo ("<br>");
    //     echo 'admin_Hello';
    // }
}
