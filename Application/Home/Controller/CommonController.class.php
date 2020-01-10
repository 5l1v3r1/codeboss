<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Org\Util\Auth;
class CommonController extends Controller
{
	public function _initialize()
	{
		if(empty(cookie('tokenstr')))
		{
			$this->error(C('Login_INFO'), U('Index/index'),3);
			return 0;
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
				$ccontent = $Users->field('uid,register_code,randomcode')->where($map)->find();
				if($ccontent["randomcode"] != $randomflag){
					$this->error(C('Login_INFO'), U('Index/index'),3);
				}
				/*else{
					echo "y";
				}*/
			}else{
				$this->error(C('Login_INFO'), U('Index/index'),3);
			}
        	//$content = $Users->field('uid,register_code')->where($data)->find();
			//$decval = decryptLoginToken(cookie('tokenstr'),$data['randomcode']);
			
		}
	}
}