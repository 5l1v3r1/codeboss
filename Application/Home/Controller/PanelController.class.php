<?php
namespace Home\Controller;
use Think\Controller;
class PanelController extends CommonController { 
    public function verifycode(){
        $Verify = new \Think\Verify();  
        $Verify->fontSize = 21;  
        $Verify->length   = 4;  
         
        //$Verify->expire = 600;  
        $Verify->entry();  
    }
    public function checkverifycode(){
        $id = '';
        $code = I('post.code','','htmlspecialchars');//
        $verify = new \Think\Verify();
        if($verify->check($code, $id)){
            echo "t";
            session('cks',$code);
        }else{
            echo "f";
        }
        
        //return $verify->check($code, $id);


    }
    public function index(){
        //echo "hahaha";
        $this->display(T('home/panel_index'));
    }
    public function account_page(){
        $info = getInfoCookie();
        if(empty($info)){
            $this->error(' Sorry! '.C('COOKIE_LATE'), U('Index/login'),3);
        }
        $this->assign('info',$info);// 赋值分页输出
        $this->display(T('home/panel_account_show'));
    }
    public function recharge_page(){
        //echo $g_uid;
        //$info = getInfoCookie();
        //print_r($info);
        $this->display(T('home/panel_recharge_show'));
    }
    public function post_recharge(){
        $data['cardid']= I('post.cardid','','htmlspecialchars');//get name
        $data['checkcode']= I('post.cardpassword','','htmlspecialchars');//get name
        $captcha = I('post.captcha','','htmlspecialchars');//get name
        $id = '';
        $verify = new \Think\Verify();
        if(session('cks') != $captcha){
            session('cks',null);
            $this->error(C('VERIYCODE_INPUT_ERROR'), U('Panel/recharge_page'),3);
        }
        
        session('cks',null);
        $M = M('cards');
        $content = $M->where($data)->find();
        if(!empty($content)){
            //echo $content["uid"];
            if(!empty($content["uid"])){
                $this->error(' Sorry! '.C('CARD_USED_ERROR'), U('Panel/recharge_page'),3);
            }else{
                $info = getInfoCookie();
                if(empty($info)){
                    $this->error(' Sorry! '.C('COOKIE_LATE'), U('Index/login'),3);
                }
                $indata["uid"] = $info["uid"];
                $indata['recharge_time'] = date('Y-m-d H:i:s',time());//
                //$map["uid"] = $indata["uid"];
                //$Users = M('users');
                $rf = $M->where($data)->save($indata);
                if($rf == 1){
                    echo "update suc";

                }else{
                    echo "err";
                }
            }
            
        }else{
            $this->error(C('CARD_INPUT_ERROR'), U('Panel/recharge_page'),3);
        }
        //print_r($data);
    }
}