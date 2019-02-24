<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;
use think\Console;
use think\log;
require('PaypalIPN.php');
use PaypalIPN;
class Zhifu extends Controller
{
    public function index()
    { 
        
        return view('zhifu');
    }
    public function suc()
    {
        // 空接口
    }
    //这里是 notify_url  设置ide接口
    public function yz(){
        // 空接口
    }
    public function cel()
    {
       
        return view('cel');
    }
    public function noTxn()
    {
       
        return view('noTxn');
    }
    public function success_self(){
        $this->redirect(url("pay/index"));
    }
    public function fail_self(){

    }
    
}
