<?php
namespace app\index\controller;
use think\Db;
use app\index\controller\Base;
use Symfony\Component\Yaml\Exception\DumpException;
class Search extends Base
{
    public function index()
    {
    //   $str = "mc_gross=5.00&invoice=1a2s3c777fkaa&protection_eligibility=Eligible&payer_id=NHW4HBLZ5Y6KJ&payment_date=23:20:28 Dec 05, 2018 PST&payment_status=Completed&charset=gb2312&first_name=test&mc_fee=0.47&notify_version=3.9&custom=&payer_status=verified&business=videoeasysoft-facilitator@163.com&quantity=1&verify_sign=AOe5GMXPVi.RDWyRpZd2KpGKFCL5ADWQ8EF-pmbLLqlZpsShGBKTz3QE&payer_email=videoeasysoft-buyer@163.com&txn_id=5AH70073C11552200&payment_type=instant&last_name=buyer&receiver_email=videoeasysoft-facilitator@163.com&payment_fee=0.47&shipping_discount=0.00&receiver_id=R3SULBHLDTLAY&insurance_amount=0.00&txn_type=web_accept&item_name=7D-1T-SELF&discount=0.00&mc_currency=USD&item_number=1&residence_country=CN&test_ipn=1&shipping_method=Default&transaction_subject=&payment_gross=5.00&ipn_track_id=130ff482578";
    $str = file_get_contents('php://input');
    $res = explode("&",$str);
      $data = [];
      foreach ($res as $key => $value) {
        $ress = explode("=",$value);
        $data[$ress[0]] = $ress[1];
      }
    //   Db('paypal')->insert($data);
    dump($data);
    }
}
