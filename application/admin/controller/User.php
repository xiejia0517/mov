<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\model\User as UserModel;
class User extends Base
{
    public function lst()
    {
        //获取当天0点0分0秒的时间戳
        $currentDaytime = strtotime(date('Y-m-d',time()));
        $currentDay = date('Y-m-d',time());
        $currentMon = date('Y-m',time());
        $currentDayres = Db('device')->where('device_create_time','>',$currentDaytime)->select();
        $currentDayres_count = count($currentDayres);

        $currentDay_payres = Db('paypal')->where('cn_time','>',$currentDaytime)->select();
        $currentDay_payres_count = count($currentDay_payres);
        
        //获取当月第一天0点0分0秒的时间戳
        $currentMontime = mktime(0,0,0,date("m"),1,date("Y"));
        $currentMonres = Db('device')->where('device_create_time','>',$currentMontime)->select();
        $currentMonres_count = count($currentMonres);

        $currentMon_payres = Db('paypal')->where('cn_time','>',$currentMontime)->select();
        $currentMon_payres_count = count($currentMon_payres);

        $deviceres = Db('device')->select();
        $paypalres = Db('paypal')->select();

        $deviceres_count = count($deviceres);
        $paypalres_count = count($paypalres);
        $percent = ($paypalres_count / $deviceres_count)*100 . '%';
        if($currentMonres_count == 0)
        {
            $percent_Mon = 0;
        }
        else
        {
            $percent_Mon = ($currentMon_payres_count / $currentMonres_count)*100 . '%';
        }
        


        $this -> assign([
            'deviceres_count' => $deviceres_count,
            'currentDayres_count' => $currentDayres_count,
            'currentDay' => $currentDay,
            'currentMon' => $currentMon,
            'currentDay_payres_count' => $currentDay_payres_count,
            'currentMon_payres_count' => $currentMon_payres_count,
            'currentMonres_count' => $currentMonres_count,
            'paypalres_count' => $paypalres_count,
            'percent' => $percent,
            'percent_Mon' => $percent_Mon,
        ]);
        //echo 'user模块';
        return $this->fetch();
        
    }
}
