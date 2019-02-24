<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**********
 * 发送邮件 *
 **********/
use think\Lang;
Lang::setAllowLangList(['zh-cn','en-us','ja-jp']);
function test()
{
    echo 'test!!!!!!aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
}
/*发送邮件方法
 *@param $to：接收者 $title：标题 $content：邮件内容
 *@return bool true:发送成功 false:发送失败
 */ function sendMail($to,$title,$content)
 {
    Vendor('PHPMailer.PHPMailerAutoload');

     $mail = new \PHPMailer(); 
     
     $mail->SMTPDebug = 1;
     $mail->isSMTP();
     $mail->SMTPAuth = true;
     $mail->Host = 'smtp.qq.com';
     $mail->SMTPSecure = 'ssl';
     $mail->Port = 465;
     $mail->Hostname = 'http://tp5.com';
     $mail->CharSet = 'UTF-8';
     $mail->FromName = 'Xavier';
     $mail->Username ='278772051@qq.com';
     $mail->Password = 'szfkziavohhwcagc';
     $mail->From = '278772051@qq.com';
     $mail->isHTML(true); 
     $mail->addAddress($to,'lsgo在线通知');
     $mail->Subject = $title;
     $mail->Body .= $content;


     $status = $mail->send();
     if($status) {
        return true;
    }else{
        return false;
    }
 }
