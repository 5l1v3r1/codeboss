<?php

//$HTTP_SERVER_VARS 与  getenv的区别      getenv不支持IIS的isapi方式运行的PHP
//$_SERVER在 PHP 4.1.0 及以后版本使用。之前的版本，使用 $HTTP_SERVER_VARS。
function getIp(){
    if ($_SERVER["HTTP_X_FORWARDED_FOR"]) { //#透过代理服务器取得客户端的真实 IP 地址
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif ($_SERVER["HTTP_CLIENT_IP"]) { //#客户端IP
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif ($_SERVER["REMOTE_ADDR"]) { //#正在浏览当前页面用户的 IP 地址
        $ip = $_SERVER["REMOTE_ADDR"];
    } elseif (getenv("HTTP_X_FORWARDED_FOR")) {  //#透过代理服务器取得客户端的真实 IP 地址
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } elseif (getenv("HTTP_CLIENT_IP")) {  //#客户端IP
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif (getenv("REMOTE_ADDR")) {  //#正在浏览当前页面用户的 IP 地址
        $ip = getenv("REMOTE_ADDR");
    } else {
        $ip = "Unknown";
        $ip_long = array(
            array('607649792', '608174079'), // 36.56.0.0-36.63.255.255
            array('1038614528', '1039007743'), // 61.232.0.0-61.237.255.255
            array('1783627776', '1784676351'), // 106.80.0.0-106.95.255.255
            array('2035023872', '2035154943'), // 121.76.0.0-121.77.255.255
            array('2078801920', '2079064063'), // 123.232.0.0-123.235.255.255
            array('-1950089216', '-1948778497'), // 139.196.0.0-139.215.255.255
            array('-1425539072', '-1425014785'), // 171.8.0.0-171.15.255.255
            array('-1236271104', '-1235419137'), // 182.80.0.0-182.92.255.255
            array('-770113536', '-768606209'), // 210.25.0.0-210.47.255.255
            array('-569376768', '-564133889'), // 222.16.0.0-222.95.255.255
            );
        $rand_key = mt_rand(0, 9);
        $ip = long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
    
    }
    
    return $ip;
}
/*
1 en
0 de
 */
function encryptDecrypt($key, $string, $decrypt){
    $method = 'DES-ECB';//加密方法
    $options = 0;//数据格式选项（可选）
    $iv = '';//加密初始化向量（可选）
     if($decrypt){
         $decrypted = openssl_encrypt($string, $method, md5(md5($key)), $options);
         return $decrypted;
     }else{
         $encrypted = openssl_decrypt($string, $method, md5(md5($key)), 0);
         return $encrypted;
     }
 }
function generateLoginToken($uid,$ip,$randomcode){
    $tokenstring = encryptDecrypt($ip,$ip."$".$uid.'$'.$randomcode,1);
    return $tokenstring;

}
function decryptLoginToken($token,$ip){
    $dec_tokenstring = encryptDecrypt($ip,$token,0);
    return $dec_tokenstring;

}

/**
 * 邮件发送函数
 */
function sendMail($to, $subject, $content) {
    Vendor('PHPMailer.PHPMailerAutoload');	 
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以126邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"name");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$subject; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //邮件正文不支持HTML的备用显示
    if(!$mail->Send()) {
        return 0;
    } else{
        return 1;
    }
}
/* get uid from cookie */
function getInfoCookie(){
    if(empty(cookie('tokenstr')))
    {
        //$this->error(C('Login_INFO'), U('Index/index'),3);
        return [];
    }else//whether is superadmin or not
    {
        $ip = getIp();
        //$ip."$".$uid.'$'.$randomcode;
        $decval = decryptLoginToken(cookie('tokenstr'),$ip);
        $resarray = explode("$",$decval);
        if(count($resarray) == 3 && $resarray[0] == $ip){
            $map['uid'] = $resarray[1];
            $randomflag = $resarray[2];
            $Users = M('users');
            $ccontent = $Users->where($map)->find();
            if($ccontent["randomcode"] != $randomflag){
                return [];
            }
            return $ccontent;
            /*else{
                echo "y";
            }*/
        }else{
            return [];
        }
        //$content = $Users->field('uid,register_code')->where($data)->find();
        //$decval = decryptLoginToken(cookie('tokenstr'),$data['randomcode']);
        
    }
}
?>