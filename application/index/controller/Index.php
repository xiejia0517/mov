<?php
namespace app\index\controller;
use think\Db;
use app\index\controller\Base;
require('FileDownloadPro.php');
use FileDownloadPro;


class Index extends Base
{
    public function index()
    {
        //$lang = \think\Lang::range();
        return $this->fetch('video_index');
    }
    public function lang()
    {
        
    }
    
    public function down()
    {

        // $file = ROOT_PATH . 'case/'.'VideoCoverter.zip';
        $vsersion_res = Db('version')->find(1);
        $file = ROOT_PATH . 'case/'.$vsersion_res['version_download'];
        dump($file);
        $name = $vsersion_res['version_download'];
        $obj = new FileDownloadPro();
        $flag = $obj->download($file, $name);
        //$flag = $obj->download($file, $name, true); // 断点续传

        if(!$flag){
            echo 'file not exists';
        }
    }
}
