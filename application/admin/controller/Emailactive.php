<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
class Emailactive extends Controller
{
    public function index()
    {
        $email = input('user_email');
        dump($email);die;
    }
}
