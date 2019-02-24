<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
class Zhifu extends Controller
{
    public function suc()
    {
        // 测试
        $pro = Db('pro')->where('pro_type',2)->find();
        dump($pro);die;
        // 吃啥
    }
    public function yz(){
        $id = 5;
        $this->assign('id',$id);
        return $this->redirect(url("index/zhifu/index"));
        // dump($_REQUEST);die;
    }
    public function cel()
    {
       
        return '支付失败';
    }
    public function front_license()
    {
        $email = input('email');
        if($email == '57454@qq.com')
        {
            $this->redirect('http://tp5.com');
        }
    }
}
