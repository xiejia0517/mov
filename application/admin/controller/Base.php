<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Admin as AdminModel;
class Base extends Controller
{
    public function _initialize()
    {
        if(!session('username'))
        {
            $this->error('请先登陆系统!','login/index');
        }
    }
}
