<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display(T('home/index'));
    }
    public function signup(){
        $this->display(T('home/signuppage'));
    }
    /* google login:
    EMAIL ,FULL NAME ,IMAGE URL 
    WECHAT
    UNINID,nickname, image url
    
     */
    public function post_signup_email(){
        $data['username']= I('post.username','','htmlspecialchars');//get name
        $data['password']= I('post.password','','htmlspecialchars');//get name
        $data['email']= I('post.email','','htmlspecialchars');//get name
        $data['uid'] = $data['email'];
        $tokenstring = I('post.tokenstring','','htmlspecialchars');//get name
        /* check */
        $cflag = 1;
        $pattern = '/^\w+$/';
        $matches = array();
        preg_match($pattern, $data['username'], $matches);
        if(count($matches) == 0 || strlen($data['username']) >30){
            $cflag = 0;
            //echo count($matches) ;
        }
        
        $pattern = '/^[\w_-]{6,16}$/';
        $matches = array();
        preg_match($pattern, $data['password'], $matches);
        if(count($matches) == 0 || strlen($data['username']) >16 || strlen($data['username']) <6){
            $cflag = 0;
        }
        
        $pattern = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
        $matches = array();
        preg_match($pattern, $data['email'], $matches);
        if(count($matches) == 0){
            $cflag = 0;
        }
        if(strlen($tokenstring) == 0){
            $cflag = 0;
        }
        if($cflag == 0){
            $this->error(' '.$data['uid'].' '.C('REGISTER_INPUT_ERROR'), U('Index/index'),3);
        }
        /* check end */



        //$data['promoterid']= I('post.promoterid','','htmlspecialchars');//get name
        $Users = M('users');
        $cond['email'] = $data['email'];
        $content = $Users->field('uid,register_code')->where($cond)->find();
        if(!empty($content))//exist
        {
            $this->error(' '.$data['uid'].' '.C('REGISTER_EXIST_ERROR'), U('Index/index'),3);
        }
        else{
            $data['register_code'] = rand(100000,999999);
            $data['password'] = md5($data['password'])."==";
            $data['usertype'] = 'email';
            $data['loginip'] = getIp();
            $data['randomcode'] = substr($tokenstring,8,6);
            $cookie_val = generateLoginToken($data['uid'],$data['loginip'],$data['randomcode']);
            cookie('tokenstr',$cookie_val,3600*24);
            //echo $cookie_val;
            //echo "<br>";
            //$decval = decryptLoginToken($cookie_val,$data['loginip']);
            //echo $decval;
            $resflag = $Users->data($data)->add();
            //echo $resflag;
            if($resflag == 1){
                //$this->success(C('REGISTER_SUCCESS'),U('Order/orderlist?flag='.$flag),1);
                //echo C('REGISTER_SUCCESS');
                $this->success(C('REGISTER_SUCCESS'),U('Panel/index'),1);
                //send email
            }else{
                $this->error(C('REGISTER_FAIL'), U('Index/index'),3); 
            }

        }

    }
    public function get_password(){
        $this->display(T('home/findpwdpage'));
    }
    public function post_find_pwd(){
        $data['email']= I('post.email','','htmlspecialchars');//get name
        $tokenstring = I('post.tokenstring','','htmlspecialchars');//get name
        $cflag = 1;
        $pattern = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
        $matches = array();
        preg_match($pattern, $data['email'], $matches);
        if(count($matches) == 0){
            $cflag = 0;
        }
        if(strlen($tokenstring) == 0){
            $cflag = 0;
        }
        if($cflag == 0){
            $this->error(' Sorry! '.C('FINDPWD_FAIL'), U('Index/login'),3);
        }
        $Users = M('users');
        $content = $Users->field('password')->where($data)->find();
        if(!empty($content))//exist
        {
            echo 'exit';
            
        }else{
            $this->error(' Sorry! '.C('FINDPWD_FAIL'), U('Index/login'),3);
        }
        //$this->display(T('home/findpwdpage'));
    }

    /* login page */
    public function login(){
        $this->display(T('home/loginpage'));
    }
    public function post_login_email(){
        $data['password'] = I('post.password','','htmlspecialchars');//get name
        $data['password'] = md5($data['password'])."==";
        $data['email']= I('post.email','','htmlspecialchars');//get name
        $tokenstring = I('post.tokenstring','','htmlspecialchars');//get name
        cookie('tokenstr',null);
        $cflag = 1;
        $pattern = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
        $matches = array();
        preg_match($pattern, $data['email'], $matches);
        if(count($matches) == 0){
            $cflag = 0;
        }
        if(strlen($data['password']) == 0){
            $cflag = 0;
        }
        if(strlen($tokenstring) == 0){
            $cflag = 0;
        }
        if($cflag == 0){
            $this->error(' Sorry! '.C('LOGIN_ERROR'), U('Index/index'),3);
        }
        /* check end */
        $Users = M('users');
        $content = $Users->field('uid')->where($data)->find();
        //print_r($content);
        if(!empty($content))//exist
        {
            $ud['loginip'] = getIp();
            $ud['randomcode'] = substr($tokenstring,8,6);
            $rf = $Users->where($data)->save($ud);
            if($rf == 1){
                $cookie_val = generateLoginToken($content['uid'],$ud['loginip'],$ud['randomcode']);
                cookie('tokenstr',$cookie_val,3600*24);
                //echo "login  succ";
                $this->success(C('LOGIN_SUCCESS'),U('Panel/index'),1);
            }else{
                $this->error(' Sorry! '.C('LOGIN_ERROR'), U('Index/index'),3);
            }
            
        }else{
            $this->error(' Sorry! '.C('LOGIN_ERROR'), U('Index/index'),3);
        }

    }
}