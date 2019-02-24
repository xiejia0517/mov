<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
require('PaypalIPN.php');
use PaypalIPN;
class Test 
{
    public function index()
    {
        $raw_post_data = file_get_contents('php://input');
        $de_raw_post_data = urldecode($raw_post_data);
        $raw_post_array = explode('&', $de_raw_post_data);
        $data = [];
        foreach ($raw_post_array as $key ) {
            $ress = explode("=",$key);
            $data[$ress[0]] = $ress[1];
          }


        $ipn = new PaypalIPN();
        $ipn->useSandbox();
        $verified = $ipn->verifyIPN();
        if($verified)
        {
            $pro_res_from_post = Db('pro')->where('pro_type',$data['item_number'])->find();

            if('JPY' == $data['mc_currency'])
            {
                $pro_ziduan = 'pro_price_jpy';
            }
            else if('USD' == $data['mc_currency'])
            {
                $pro_ziduan = 'pro_price_usd';
            }
            $price_int =  (int)($pro_res_from_post[$pro_ziduan] * 100);
            
            $mc_gross_int = (int)(floatval($data['mc_gross']) * 100);
           
            if($price_int == $mc_gross_int)
            {
                //多一层判断 mc_gross 字段 
                $txn = $data['invoice'];
                $license_code = md5($txn . time());
                $pro_res = Db('pro')->where('pro_type',$data['item_number'])->find();
                $license_data = ['license_code'=>$license_code,
                'license_count'=>$pro_res['pro_device_count'],
                'license_paypal_tx'=>$data['txn_id'],
                'license_time'=>time(),
                'license_user_email'=>$data['payer_email'],
                'license_status'=>true, 
                'license_pro_type'=>$data['item_number']   
                ];

                $datares = [
                    'mc_gross'=>$data['mc_gross'],
                    'invoice'=>$data['invoice'],
                    'protection_eligibility'=>$data['protection_eligibility'],
                    'payer_id'=>$data['payer_id'],
                    'payment_date'=>$data['payment_date'],
                    'payment_status'=>$data['payment_status'],
                    'first_name'=>$data['first_name'],
                    'mc_fee'=>$data['mc_fee'],
                    'notify_version'=>$data['notify_version'],
                    'custom'=>$data['custom'],
                    'payer_status'=>$data['payer_status'],
                    'business'=>$data['business'],
                    'quantity'=>$data['quantity'],
                    'verify_sign'=>$data['verify_sign'],
                    'payer_email'=>$data['payer_email'],
                    'txn_id'=>$data['txn_id'],
                    'payment_type'=>$data['payment_type'],
                    'last_name'=>$data['last_name'],
                    'receiver_email'=>$data['receiver_email'],
                    'payment_fee'=>$data['payment_fee'],
                    'shipping_discount'=>$data['shipping_discount'],
                    'receiver_id'=>$data['receiver_id'],
                    'insurance_amount'=>$data['insurance_amount'],
                    'txn_type'=>$data['txn_type'],
                    'item_name'=>$data['item_name'],
                    'discount'=>$data['discount'],
                    'mc_currency'=>$data['mc_currency'],
                    'item_number'=>$data['item_number'],
                    'residence_country'=>$data['residence_country'],
                    'shipping_method'=>$data['shipping_method'],
                    'transaction_subject'=>$data['transaction_subject'],
                    'payment_gross'=>$data['payment_gross'],
                    'ipn_track_id'=>$data['ipn_track_id'],
                    'cn_time' => time(),
                ];
                Db('paypal')->insert($datares);
                Db('license')->insert($license_data);
                // $content = '<h5>您的激活码为 : </h5>' . '<h2>' . $license_code . '</h2>';
                // $content = '<div>Dear Sir or Madam,&nbsp;</div><div>Your license code: &nbsp;</div><div><h3>'.$license_code.'</h3></div><div><br></div><div>In case of need, please do not hesitate to contact us by:&nbsp;</div><div>Support@VideoEasySoft.com</div><div>We shall reply you within 24 hours.&nbsp;</div><div><br></div><div>-----------</div><div><br></div><div>購入したお客様について &nbsp;</div><div>ライセンスコード： &nbsp;</div><div><h3>'.$license_code.'</h3></div><div><br></div><div>ご質問は以下メールアドレスまでお願いいたします。&nbsp;</div><div>Support@VideoEasySoft.com&nbsp;</div><div>弊社規定の休日/土日/祝祭日を除き、営業時間中に速やかに返信を行います。&nbsp;</div>';
                
                // if(!sendMail('','Support@videoeasysoft.com',$content))
                // {
                //     $status = ['status'=>true,'errorCode'=>1005,'errorMessage'=>'SendMail Failed!'];
                //     return json_encode($status);
                // }
            }
            else
            {
                $status = ['status'=>true,'errorCode'=>1004,'errorMessage'=>'mc_gross_unMatch'];
                return json_encode($status);
            }
            
        }
            // 测试用
        
    }
    public function creat_license($paypaltx)
    {
        $license_code = md5($paypaltx . time());
        return $license_code;
    }
   
}
