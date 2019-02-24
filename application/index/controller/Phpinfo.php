<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Phpinfo extends Controller
{
    public function index()
    {
       phpinfo();
       return $this->fetch('phpinfo');
    }
}
