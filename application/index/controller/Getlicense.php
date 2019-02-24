<?php
namespace app\index\controller;
use think\Db;
use think\Session;
use think\Cookie;
use think\Lang;
use app\index\controller\Base;

class Getlicense extends Base
{
    
    public function get()
    {
        if(request()->isget())
        {
            $yanzhengshibai = Lang::get('59');
            $userinfo = $_GET;
            // 对比数据库进行验证
            $a_code = Session::get('user_active_code');
            $u_email = Session::get('paypal_user_email');
            die;
            if($a_code == $userinfo['user_active_code'])
            {
                $license_query = Db('license')->where('license_user_email',$userinfo['email'])->select();
                if($license_query)
                {
                    $this->assign('license_query',$license_query);
                    return view();
                }
                else
                {
                    //查询失败
                    return view('zhifu/noTxn'); 
                }        
            }
            else
            {
                //激活失败
                return $this->error($yanzhengshibai,'pay/index');
            }
        }


        
     
    }
    public function checkM()
    {

        if(request()->ispost())
        {
            $user_email = input('user_email');
            $license_get_res = Db('license')->where('license_user_email',$user_email)->where('license_status',1)->select();
            if($license_get_res)
            {
                $license_code_arr = '';
                foreach ($license_get_res as $key => $value) {
                    
                        $license_code_arr = $license_code_arr.$value['license_code'].'<br>';
                   
                }
                //发送邮件，并且跳转提示
                $content = '<div>Dear Sir or Madam,&nbsp;</div><div>Your license code: &nbsp;</div><div><h3>'.$license_code_arr.'</h3></div><div><br></div><div>In case of need, please do not hesitate to contact us by:&nbsp;</div><div>Support@VideoEasySoft.com</div><div>We shall reply you within 24 hours.&nbsp;</div><div><br></div><div>-----------</div><div><br></div><div>購入したお客様について &nbsp;</div><div>ライセンスコード： &nbsp;</div><div><h3>'.$license_code_arr.'</h3></div><div><br></div><div>ご質問は以下メールアドレスまでお願いいたします。&nbsp;</div><div>Support@VideoEasySoft.com&nbsp;</div><div>弊社規定の休日/土日/祝祭日を除き、営業時間中に速やかに返信を行います。&nbsp;</div>'; 
                if(sendMail($user_email,"VideoeasySoft",$content))
                {
                    return view();
                }
                else
                {
                    $status = ['status'=>true,'errorCode'=>1007,'errorMessage'=>'sendMailFailed!'];
                    return json_encode($status);
                }
            }
            else
            {
                //跳转错误提示
                return view('zhifu/noTxn');
            }
            // $active_code = md5(time().'videoeasysoft');
            // Session::clear();
            // Session::set('paypal_user_email',$user_email);
            // Session::set('user_active_code',$active_code);
            // $yourlicense = Lang::get('60');
            // $clickhere = Lang::get('61');
            // $youjianyifasong = Lang::get('62');
                // $content="<a href='http://tp5.com/public/index.php/index/Getlicense/get/?user_active_code=".(Session::get('user_active_code'))."&email=".$user_email."'>".$yourlicense." ".(Session::get('user_active_code'))." ".$clickhere."</a>";
                // $email_status = sendMail($user_email,"VideoeasySoft",$content);
                // return $this->success($youjianyifasong);
            
        }
        return view();
    }
    
}
