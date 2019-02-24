<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Cont extends Controller
{
    public function index()
    {
        return $this->fetch('cont');
    }
}
