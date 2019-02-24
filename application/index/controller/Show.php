<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Lang;

class Show extends Controller
{
    public function index()
    {
        $res = sendMail('xiejia0517@126.com','aaa','aaa');
        
        dump($res);
    }
}
