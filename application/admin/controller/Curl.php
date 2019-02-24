<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
class Curl extends Controller
{
    public function license()
    {
        $data = $_POST;
        $currenttime = time();
        $arr = [];
        $licenseres = Db('license')->select();
        foreach ($licenseres as $key => $value) {
            
            $license_time = $value['license_time'];
            $res = $currenttime - $license_time ;
            $license_id = $value['license_id'];
            if($res>1)
            {
                Db('license')->where('license_id',$value['license_id'])->update(['license_count'=>0]);
            }
            
        }
         return json_encode($licenseres[0]['license_count']);
    }
        
}
