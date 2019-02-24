<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
header("Access-Control-Allow-Origin: *");
class Base extends Controller
{
    public function _initialize()
    {
        $cateres = Db('cate')->order('id asc')->select();
        $this->assign('cateres',$cateres);
    }
}
