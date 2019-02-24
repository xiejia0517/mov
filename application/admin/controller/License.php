<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Admin;
use think\Request;
use think\Log;
class License extends Controller
{
    public function license()
    {
        $client_license = $_POST;
        if($client_license)
        {
            $device_res_fir = Db('device')->where("device_code",$client_license['device_code'])->find();
            if(!$device_res_fir)
            {
                $data = ['device_code'=>$client_license['device_code'],'device_status'=>false];
                if(!Db('device')->insert($data))
                {
                    throw new Exception("Insert Database error!");
                }
            }
            $device_res = Db('device')->where("device_code",$client_license['device_code'])->find();
            
            if($device_res['device_status'] == false)
            {
                 // 查询license_code 状态
                 $license_res = Db('license')->where('license_code',$client_license['license_code'])->find();
                 if($license_res)
                 {
                     if($license_res['license_status'] == true)
                     {
                         Db('license')->where('license_id',$license_res['license_id'])->setDec('license_count');
                         $current_license_res = Db('license')->where('license_id',$license_res['license_id'])->find();
                         if($current_license_res['license_count'] == 0)
                         {
                             Db('license')->where('license_id',$current_license_res['license_id'])->update(['license_status'=>false]);
                         }
                         $time = time();
                         if(Db('device')->where('device_id',$device_res['device_id'])->update(['device_code'=>$client_license['device_code'],'device_license_code'=>$client_license['license_code'],'device_status'=>true,'device_active_time'=>$time]))
                         {
                            $prores = Db('pro')->where('pro_type',$license_res['license_pro_type'])->find();
                             $status = ['status'=>true,'status_message'=>'Active sucessed','license_code'=>$current_license_res['license_code'],'active'=>1,'pro_term'=>$prores['pro_term']];
                             
                             return json_encode($status);
                         }
                         else
                         {
                             $status = ['status'=>true,'status_message'=>'Databse update failed'];
                             return json_encode($status);
                         }
                     }
                     else
                     {
                         $status = ['status'=>false,'status_message'=>'License Unavailable'];
                         return json_encode($status);
                     }
                 }
                 else
                 {
                      $status = ['status'=>false,'status_message'=>'License Non-existent'];
                      return json_encode($status);
                 }
            }
            else
            {
                $postLicenseCode = $client_license["license_code"];
                $postDeviceCode = $client_license['device_code'];
                $check = $this->checkllicense($postLicenseCode,$postDeviceCode);
                if($check == -1)
                {
                    $status = ['status'=>true,'errorCode'=>1001,'errorMessage'=>'license repeat'];
                    return json_encode($status);
                }
                else if($check == 0)
                {
                    $status = ['status'=>true,'errorCode'=>1002,'errorMessage'=>'license Unavailable'];
                    return json_encode($status);
                }
                else if(-2 == $check)
                {
                    $status = ['status'=>true,'errorCode'=>1003,'errorMessage'=>'unkown info'];
                    return json_encode($status);
                }
                else
                {
                    //更新
                    $device_res = Db('device')->where('device_code',$postDeviceCode)->find();
                    $license_res = Db('license')->where('license_code',$postLicenseCode)->find();



                    Db('license')->where('license_id',$license_res['license_id'])->setDec('license_count');
                    $current_license_res = Db('license')->where('license_id',$license_res['license_id'])->find();
                    if($current_license_res['license_count'] == 0)
                    {
                        Db('license')->where('license_id',$current_license_res['license_id'])->update(['license_status'=>false]);
                    }
                    
                    Db('device')->where('device_id',$device_res['device_id'])->update([
                        'device_license_code'=>$postLicenseCode,
                        'device_status' => true
                    ]);
                }
                
                $device_res = Db('device')->where('device_code',$postDeviceCode)->find();

                $license_res_tem = Db('license')->where('license_code',$device_res['device_license_code'])->find();
                $pro_res_tem = Db('pro')->where('pro_type',$license_res_tem['license_pro_type'])->find();
                $current_term = $this->getterm($device_res['device_active_time']);
                $status = ['status'=>true,'status_message'=>'Already activated','active'=>1,'pro_term'=>$pro_res_tem['pro_term'],'license_code'=>$license_res_tem['license_code'],'license_remaining_time'=>$current_term];
                return json_encode($status);
            }
            
            
        }
        else
        {
            throw new Exception("Missing POST Data");
            
        }
        
    }
    public function checkllicense($license_code,$device_code)
    {
        $device_res = Db('device')->where('device_code',$device_code)->find();
        if($device_res)
        {
            if($device_res['device_license_code'] == $license_code)
            {
                return -1;//提交的license和已激活的license相同
            }
            else
            {
                $license_res = Db('license')->where('license_code',$license_code)->find();
                if($license_res['license_status'] == false)
                {
                    return 0;//license不可用或者过期
                }
                else
                {
                    return 1;//license可用
                }
            }
        }
        else
        {
            return -2;
        }
    }
    public function getterm($device_active_time)
    {
        $current_time = time();
        $current_term = $current_time - $device_active_time;
        return $current_term;
    }
    public function query()
    {
        $client = $_POST;;
        if($client)
        {
            $device_res = Db('device')->where('device_code',$client['device_code'])->find();
            if($device_res)
            {
                if($device_res['device_status'] == true)
                {
                    $license_sear = Db('license')->where('license_code',$device_res['device_license_code'])->find();
                    $pro = Db('pro')->where('pro_type',$license_sear['license_pro_type'])->find();
                    $current_term = $this->getterm($device_res['device_active_time']);
                    // $current_time = time();
                    // $current_term = $current_time - $device_res['device_active_time'];
                    // if($device_res['device_license_code'] == array('eq','NULL'))
                    // {

                    // };

                    $status = ['status'=>true,
                    'active_time'=>$device_res['device_active_time'],
                    'current_time'=>time(),
                    'active'=>1,
                    'status_message'=>'Already activated',
                    'license_code'=>$device_res['device_license_code'],
                    'license_remaining_time'=>$current_term,
                    'pro_term'=>$pro['pro_term']];
                    return json_encode($status);
                }
                else
                {
                    $status = ['status'=>true,'status_message'=>'Not activated','active'=>false];
                    return json_encode($status);
                }
            }
            else
            {
                $data = ['device_code'=>$client['device_code'],'device_status'=>false,'device_create_time'=>time()];
                if(!Db('device')->insert($data))
                {
                    throw new Exception("Insert Database error!");
                }
                $status = ['status'=>true,'status_message'=>'device_code Non-existent','active'=>false];
                return json_encode($status);
            }
        }
        else
        {
            // $status = ['status'=>404,'status_message'=>'Post dismissed'];
            // return json_encode($status);
            throw new Exception("Missing POST Data");
        }
        
    }
}
