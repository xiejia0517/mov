<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Privacy extends Controller
{
    public function index()
    {
        return $this->fetch('privacy');
    }
}
