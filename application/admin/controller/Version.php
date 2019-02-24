<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Admin;
use think\Request;
use think\Log;
class Version extends Controller
{
    public function version()
    {
       $version_res = Db('version')->find(1);
       $status = ['version_number'=>$version_res['version_number'],'version_download'=>$version_res['version_download']];
       return json_encode($status);
    }
   
}
