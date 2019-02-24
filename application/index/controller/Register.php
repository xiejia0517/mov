<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Register extends Controller
{
    public function index()
    {
        // echo 'Cate';
        // echo ("<br>");
    return $this->fetch('register');
    }
}
