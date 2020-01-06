<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Org\Util\Auth;
class CommonController extends Controller
{
	public function _initialize()
	{
		if(empty(session('admin_uid')))
		{
			//echo __SELF__;
			//echo __APP__;
			$urltmp = str_replace(__APP__."/","",__SELF__);
			//echo $urltmp;
			//echo $urltmp;
			$urltmpenc = "";
			if(!empty($urltmp)){
				$urltmpenc = str_replace(array('+', '/'), array('-', '_'), base64_encode($urltmp));
				//echo $urltmpenc;
			}
			$this->error(C('LOGIN_TIPS'),U('Login/index?redirect='.$urltmpenc.''),3);
			//exit(0);
			return 0;
		}else//whether is superadmin or not
		{
			$pwdtxt = encryptDecrypt('3330', session('admin_uid'),0);
			//echo $pwdtxt;
			//exit();
			$auth =new Auth();
			//echo MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME;
			//echo cookie('admin_uid');
			//echo $pwdtxt."<br>";
			//echo substr($pwdtxt , 17);
			//exit(0);
			if(!$auth->check(strtolower(MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME),substr($pwdtxt , 17)))
			{
				//echo U('Login/index?modulename='.CONTROLLER_NAME.'');
				$this->error(C('PERMISSION_DENIED_WARNING'), U('Login/index'),3);
				return 0;
			}
			
		}
	}
}